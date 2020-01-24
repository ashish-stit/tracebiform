<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\JoshController;
use App\Http\Requests\ConfirmPasswordRequest;
use App\Mail\Register;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Reminder;
use Sentinel;
use URL;
use DB;
use Validator;
use View;
use Session;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ForgotRequest;
use stdClass;
use App\Mail\ForgotPassword;


class AuthController extends JoshController
{
    /**
     * Account sign in.
     *
     * @return View
     */

    private $user_activation = false;
    private function respondWithError($code, $message, $data)
    {
        return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
    }
    public function getSignin()
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('admin.dashboard');
        }

        // Show the page
        return view('admin.login');
    }

    /**
     * Account sign in form processing.
     * @param Request $request
     * @return Redirect
     */
    public function postSignin(Request $request)
    {

        try {
            // Try to log the user in
            if ($user = Sentinel::authenticate($request->only(['email', 'password']), $request->get('remember-me', 0))) {

                return Redirect::route("admin.dashboard")->with('success', trans('auth/message.signin.success'));
            }

            $this->messageBag->add('email', trans('auth/message.account_not_found'));

        } catch (NotActivatedException $e) {
            $this->messageBag->add('email', trans('auth/message.account_not_activated'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', trans('auth/message.account_suspended', compact('delay')));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postSignup(UserRequest $request)
    {

    //     try {
    //         // Register the user
    //             $p_LoginName=$request->login_name;
    //             $p_Password = $request->password;
    //             $p_UserTypeID= $request->type;
    //             $p_ReferenceID=$request->reference;
    //             $p_SecurityLevelID="1";
    //             $p_LastName = $request->last_name;
    //             $p_FirstName = $request->first_name;
    //             $p_Title = $request->title;
    //             $p_TitleOfCourtesy=$request->courtesy;
    //             $p_BirthDate=$request->birthdate;
    //             $p_HireDate=$request->hiredate;
    //             $p_Address=$request->address;
    //             $p_City=$request->city;
    //             $p_Region=$request->region;
    //             $p_PostalCode=$request->postalcode;
    //             $p_Country=$request->country;
    //             $p_HomePhone=$request->homephone;
    //             $p_Extension=$request->extension;
    //             $p_Notes=$request->notes;
    //             $p_ReportsTo= $request->reportto;
    //             $p_Email = $request->email;

    //             $p_Active='1';
    //             $p_Photo='abc.jpg';
    //             $p_UserID='';

    //         DB::insert('call USP_Users_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($p_LoginName,$p_Password,$p_UserTypeID,$p_ReferenceID,$p_SecurityLevelID,$p_LastName,$p_FirstName,$p_Title,$p_TitleOfCourtesy,$p_BirthDate,$p_HireDate,$p_Address,$p_City,$p_Region,$p_PostalCode,$p_Country,$p_HomePhone,$p_Extension,$p_Notes,$p_Extension,$p_Notes,$p_ReportsTo,$p_Email,$p_Active,$p_Photo,$p_UserID));

    //         return Redirect::route("admin.dashboard")->with('success', trans('auth/message.signup.success'));

    //     } catch (UserExistsException $e) {
    //         echo $e->messageBag();
    //         $this->messageBag->add('email', trans('auth/message.account_already_exists'));
    //     }

    //     // Ooops.. something went wrong
    //     return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     * @return
     */
    public function getActivate($userId,$activationCode = null)
    {
        // Is user logged in?
        if (Sentinel::check()) {
            return Redirect::route('admin.dashboard');
        }

        $user = Sentinel::findById($userId);
        $activation = Activation::create($user);

        if (Activation::complete($user, $activation->code)) {
            // Activation was successful
            // Redirect to the login page
            return Redirect::route('signin')->with('success', trans('auth/message.activate.success'));
        } else {
            // Activation not found or not completed.
            $error = trans('auth/message.activate.error');
            return Redirect::route('signin')->with('error', $error);
        }

    }

    /**
     * Forgot password form processing page.
     * @param Request $request
     *
     * @return Redirect
     */
    public function postForgotPassword(ForgotRequest $request)
    {
        $data = new stdClass();

        try {
            // Get the user password recovery code
            $user = Sentinel::findByCredentials(['email' => $request->get('email')]);

            if (!$user) {
                return back()->with('error', trans('auth/message.account_email_not_found'));
            }
            $activation = Activation::completed($user);
            if(!$activation){
                return back()->with('error', trans('auth/message.account_not_activated'));
            }
            $reminder = Reminder::exists($user) ?: Reminder::create($user);
            // Data to be used on the email view

            $data->user_name = $user->first_name .' ' .$user->last_name;
            $data->forgotPasswordUrl = URL::route('forgot-password-confirm', [$user->id, $reminder->code]);

            // Send the activation code through email

            Mail::to($user->email)
            ->send(new ForgotPassword($data));

        } catch (UserNotFoundException $e) {
            // Even though the email was not found, we will pretend
            // we have sent the password reset code through email,
            // this is a security measure against hackers.
        }

        //  Redirect to the forgot password
        return back()->with('success', trans('auth/message.forgot-password.success'));
    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param number $userId
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm($userId,$passwordResetCode = null)
    {
        // Find the user using the password reset code
        if(!$user = Sentinel::findById($userId)) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', trans('auth/message.account_not_found'));
        }
        if($reminder = Reminder::exists($user)) {
            if($passwordResetCode == $reminder->code) {
                return view('admin.auth.forgot-password-confirm');
            } else{
                return 'code does not match';
            }
        } else {
            return 'does not exists';
        }

        // Show the page
        // return View('admin.auth.forgot-password-confirm');
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param Request $request
     * @param number $userId
     * @param  string   $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm(ConfirmPasswordRequest $request, $userId, $passwordResetCode = null)
    {

        // Find the user using the password reset code
        $user = Sentinel::findById($userId);
        if (!$reminder = Reminder::complete($user, $passwordResetCode, $request->get('password'))) {
            // Ooops.. something went wrong
            return Redirect::route('signin')->with('error', trans('auth/message.forgot-password-confirm.error'));
        }

        // Password successfully reseted
        return Redirect::route('signin')->with('success', trans('auth/message.forgot-password-confirm.success'));
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {

        if (Sentinel::check()) {
            //Activity log
            $user = Sentinel::getuser();
            activity($user->full_name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');
            // Log the user out
            Sentinel::logout();
        }


        // Redirect to the users page
        return redirect('login')->with('success', 'You have successfully logged out!');
    }

    /**
     * Account sign up form processing for register2 page
     *
     * @param Request $request
     *
     * @return Redirect
     */
    public function postRegister2(UserRequest $request)
   {

        try {

// Register the user
            $p_LoginName=$request->login_name;
            $p_Password = $request->password;
            $p_UserTypeID= $request->type;
            $p_ReferenceID=$request->reference;
            $p_SecurityLevelID="1";
            $p_LastName = $request->last_name;
            $p_FirstName = $request->first_name;
            $p_Title = $request->Title;
            $p_TitleOfCourtesy=$request->TitleOfCourtesy;
            $p_BirthDate=$request->BirthDate;
            $p_HireDate=$request->HireDate;
            $p_Address=$request->address;
            $p_City=$request->city;
            $p_Region=$request->Region;
            $p_PostalCode=$request->PostalCode;
            $p_Country=$request->country;
            $p_HomePhone=$request->HomePhone;
            $p_Extension=$request->Extension;
            $p_Photo='abc.jpg';
            $p_Notes=$request->Notes;
            $p_ReportsTo= $request->ReportsTo;
            $p_Email = $request->email;
            $p_Active=$request->Active;
            $p_UserID='';

            DB::insert('call USP_Users_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($p_LoginName,$p_Password,$p_UserTypeID,$p_ReferenceID,$p_SecurityLevelID,$p_LastName,$p_FirstName,$p_Title,$p_TitleOfCourtesy,$p_BirthDate,$p_HireDate,$p_Address,$p_City,$p_Region,$p_PostalCode,$p_Country,$p_HomePhone,$p_Extension,$p_Photo,$p_Notes,$p_ReportsTo,$p_Email,$p_Active,$p_UserID));
              Session::flash('msg','User Added');
              return redirect('admin/userlist');

        } catch (UserExistsException $e) {
            echo $e->messageBag();
            $this->messageBag->add('email', trans('auth/message.account_already_exists'));
        }

// Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }
        public function userlist()
        {
           $users=DB::select('call USP_Users_Getdata(?)',[1]);
           return view('admin/blank')->with("users", $users);

        }
        public function userdeletes($id)

        {

            $users=DB::delete('call USP_Users_Delete(?)',[$id]);
            Session::flash('msg','User Profile Deleted');
            return redirect('admin/userlist');
        }
        public function useredit($id)
        {
             $users_data=DB::select('call USP_Users_GetSingle(?)',[$id]);
             return view('admin/userupdate')->with('users',$users_data);
        }
        public function userupdate(Request $request)
        {
            try{
            $p_UserID=$request->userID;
            $p_LoginName=$request->LoginName;
            $p_LastName=$request->LastName;
            $p_FirstName=$request->FirstName;
             $p_Title=$request->Title;
            $p_City=$request->City;
            $p_Email=$request->Email;
           
            
           DB::update('call USP_Users_Update(?,?,?,?,?,?,?)',array($p_UserID,$p_LoginName,$p_LastName,$p_FirstName,$p_Title,$p_City,$p_Email));
              Session::flash('msg','User Profile Updated');
               return redirect('admin/userlist');
        
            }
            catch (\Exception $e)
         {
            echo $e->getmessage();
           return $this->respondWithError(500,"Internal Server Error!",array());
        }

        }
        public function USP_User_Login(Request $request)
        {
          $p_Email=$request->email;
          $p_Password=$request->password;
          DB::select('call USP_User_Login(?,?)',array($p_Email,$p_Password));
          return view('admin/ratings');
        } 
      public function pti()
      {
        return view('admin/pti');
      }

}
