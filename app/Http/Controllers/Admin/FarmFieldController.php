<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

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
           echo "saved";

		}
	    catch (\Exception $e)

	   	 {
	   	 	 echo $e->getmessage();
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}
	
}
