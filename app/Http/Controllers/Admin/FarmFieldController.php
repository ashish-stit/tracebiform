<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Support\Facades\Input;

class FarmFieldController extends Controller
{
     private function respondWithError($code, $message, $data)
	{
		return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
	}
	public function getform()
	{
		 $formfield_data=DB::select('call USP_Suppliers_All');
         return view('admin/farm')->with("formfield_data", $formfield_data);
     
	}
	public function postfarm(Request $request)
	{
		try
		{
		  $p_FarmFieldID='';
          $p_FieldIDNumber=$request->FieldIDNumber;
          $p_LegalDescription=$request->LegalDescription;
          $p_IrrigationSource2=$request->IrrigationSource2;
          $p_FieldName=$request->FieldName;
          $p_TotalAcres=$request->TotalAcres;
          $p_IrrigationSource3=$request->IrrigationSource3;
          $p_SupplierID=$request->SupplierName;
          $p_IrrigationSource1=$request->IrrigationSource1;
          $p_Comments=$request->Comments;
           DB::insert('call USP_FarmFields_Insert(?,?,?,?,?,?,?,?,?,?)',array($p_FieldIDNumber,$p_LegalDescription,$p_IrrigationSource2,$p_FieldName,$p_TotalAcres,$p_IrrigationSource3,$p_SupplierID,$p_IrrigationSource1,$p_Comments,$p_FarmFieldID));
            Session::flash('msg','Farm Field Saved');
             return redirect('admin/frmlist');

		}
	    catch (\Exception $e)

	   	 {
	   	 	 echo $e->getmessage();
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}
	public function addmoreform(Request $request)
	{
		echo "ggggggg";
	}
    public function farmlist(Request $request)
    {
    	 $user_data=DB::select('call USP_FarmFields_All');
          return view('admin\farmfield')->with('users',$user_data);
    }
    public function editFarmFieldID($FarmFieldID)
    {
    	try{
    		$farmfield_data=DB::select('call USP_FarmFields_Get(?)',[$FarmFieldID]);
           return view('admin/farmfieldedit')->with('data',$farmfield_data);
    	    }
    	catch (\Exception $e)

	   	 {
	   	 	 
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
    }
    public function updatefarmfield(Request $request)
    {
    	try
    	{
          $p_FarmFieldID=$request->FarmFieldID;
          $p_FieldIDNumber=$request->FieldIDNumber;
          $p_LegalDescription=$request->LegalDescription;
          $p_IrrigationSource2=$request->IrrigationSource2;
          $p_FieldName=$request->FieldName;
          $p_TotalAcres=$request->TotalAcres;
          $p_IrrigationSource3=$request->IrrigationSource3;
          $p_SupplierID=$request->Ounces;
          $p_IrrigationSource1=$request->IrrigationSource1;
          $p_Comments=$request->Comments;
          DB::select('call USP_FarmFields_Update(?,?,?,?,?,?,?,?,?,?)',[$p_FarmFieldID,$p_FieldIDNumber,$p_LegalDescription,$p_IrrigationSource2,$p_FieldName,$p_TotalAcres,$p_IrrigationSource3,$p_SupplierID,$p_IrrigationSource1,$p_Comments]);
             Session::flash('msg','Farm Field updated');
             return redirect('admin/frmlist');
         

    	}
    	catch (\Exception $e)

	   	 {
	   	 	 echo $e->getmessage();
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
    }
	public function farmfielddelete($p_FarmFieldID)
	{
		 $users=DB::delete('call USP_FarmFields_Delete(?)',[$p_FarmFieldID]);
    	   Session::flash('msg','Farm Field deleted');
           return redirect('admin/frmlist');

	}
}
