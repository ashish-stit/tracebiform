<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Session;

class PesticidesController extends Controller
{
  private function respondWithError($code, $message, $data)
	{
		return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
	}

    public function addpesticides(Request $request)
    {
    	return view('admin/addpesticides');
    }
    public function postpesticides(Request $request)
    {
      try
	   	{
	   		$p_PesticideName = $request->PestcidesName;
	   		$p_RatesListedPer=$request->ratelistedper;
	   		$p_RestrictedUseData = $request->hervestinterval;
	   		//$p_Toxicity=$request->toxicity;
	   		$p_ProductRate=$request->productrate;
	   		$p_ApplicatorName=$request->applicatorname;
	   		$p_GPA=$request->gpa;
	   		$p_NozzelSetup=$request->nozelsetup;
	   		$p_PesticideLabelSignalWord=$request->pesticidelabel;
	        $p_EPARegistrationNumber = $request->epanumber;
	        $p_ProductMeasurementTypeID=$request->Ounces;
	        $p_CertificationNumber=$request->certficationnumber;
	        $p_Concentration=$request->concetration;
	        $p_SprayingInstructions=$request->sprayinginstruction;
	        $p_RestrictedEntryLevelData=$request->intergrident;	  
	        $p_WPSOralNotification=$request->notification;
	        $p_Speed='ddd';
	        $p_MPH='kkk';
	        $p_Formulation='lll';
	        $p_ActiveIndegrident='wwwww';
            //$p_Interval=$request->interval;
	        $p_TotalProductConsumed=$request->consume;
	        $p_ratelisted=$request->ratelisted;
	        $p_SprayRig=$request->sprayrig;
	        $p_PesticideID='';
	        DB::insert('call USP_Pesticides_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($p_PesticideName,$p_RatesListedPer,$p_RestrictedUseData,$p_ProductRate,$p_ApplicatorName,$p_GPA,$p_NozzelSetup,$p_PesticideLabelSignalWord,$p_EPARegistrationNumber,$p_ProductMeasurementTypeID,$p_CertificationNumber,$p_Concentration,$p_SprayingInstructions,$p_RestrictedEntryLevelData,$p_WPSOralNotification,$p_Speed,$p_MPH,$p_Formulation,$p_ActiveIndegrident,$p_TotalProductConsumed,$p_ratelisted,$p_SprayRig,$p_PesticideID));

	        Session::flash('msg','Pesticides Saved');
             return redirect('admin/pesticideslist');
	         }
	   	catch (\Exception $e)
	   	 {
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
    }
    public function pesticideslist(Request $request)
    {
    	try
    	{
          $user_data=DB::select('call USP_Pesticides_Get(?)',[1]);
           return view('admin/pesticides')->with("users", $user_data);
    	}
    	catch (\Exception $e)
	   	 {
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
    }
    public function pesticidesdelete($p_PesticideID)
    {
    	try
    	{
    	   $users=DB::delete('call USP_Pesticides_Delete(?)',[$p_PesticideID]);
    	    Session::flash('msg','Pesticides deleted');
          return redirect('admin/pesticideslist');

    	}
    	catch (\Exception $e)
	   	 {
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
    }
    public function pesticidesedit($p_PesticideID)
    {
    	try
    	{
    		
    		$pesticides_data = DB::select('call USP_Pesticides_update(?)',[$p_PesticideID]);
    		return view('admin/pesticidesedit')->with('pesticides_data',$pesticides_data);

           
    	}
    	catch (\Exception $e)
	   	 {
	   	   echo $e->getmessage();
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}

    }
    public function updtpesticides(Request $request)
    {
    	$p_PesticideID=$request->pesticidesID;
    	$p_PesticideName=$request->PestName;
    	$p_PesticideLabelSignalWord=$request->SignalWord;
        $p_WPSOralNotification=$request->Notification;
    	$p_ActiveIndegrident=$request->Indegrident;
    	$p_RestrictedEntryInterval=$request->Interval;
    	$p_CertificationNumber=$request->certification;
    	DB::update('call USP_Pesticides_Updatedata(?,?,?,?,?,?,?)',[$p_PesticideID,$p_PesticideName,$p_PesticideLabelSignalWord,$p_WPSOralNotification,$p_ActiveIndegrident,$p_RestrictedEntryInterval,$p_CertificationNumber]);
    	 Session::flash('msg','Pesticides updated');
          return redirect('admin/pesticideslist');


    }
}
