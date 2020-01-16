<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GrowersController extends Controller
{
	private function respondWithError($code, $message, $data)
	{
		return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
	}

	public function postgrowers(Request $request)
	{
		try{
			$p_CompanyName=$request->CompanyName;
			$p_ContactName=$request->ContactName;
			$p_ContactTitle=$request->ContactTitle;
			$p_Address=$request->Address;
			$p_City=$request->City;
			$p_Region=$request->Region;
			$p_PostalCode=$request->PostalCode;
			$p_Country=$request->Country;
			$p_Phone=$request->Phone;
			$p_Fax=$request->Fax;
			$p_HomePage=$request->HomePage;
			$p_Email=$request->Email;
			$p_CompanyUCCprefix=$request->CompanyUCCprefix;
			$p_SupplierID='';
			DB::insert('call USP_Suppliers_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($p_CompanyName,$p_ContactName,$p_ContactTitle,$p_Address,$p_City,$p_Region,$p_PostalCode,$p_Country,$p_Phone,$p_Fax,$p_HomePage,$p_Email,$p_CompanyUCCprefix,$p_SupplierID));
			return redirect('admin/growers');
		}
		catch (\Exception $e)
		{
	   	 	//echo $e->getmessage();
			return $this->respondWithError(500,"Internal Server Error!",array());
		}

	}

	public function getgrowers(){
		try{
			$growers_data=DB::select('call USP_Suppliers_All');
			return view('admin/growers')->with('growers_data',$growers_data);
		}
		catch (\Exception $e)
		{
	   	 	//echo $e->getmessage();
			return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}
	public function trashgrowers($SupplierID)
	{
		try{
			$remove_growers=DB::delete('call USP_Suppliers_Delete(?)',[$SupplierID]);
			return redirect('admin/growers');
		}
		catch (\Exception $e)
		{
	   	 	//echo $e->getmessage();
			return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}
	public function editgrowers($SupplierID)
	{
		try{
			$growers_edit=DB::select('call USP_Supplier_Get(?)',[$SupplierID]);
			return view('admin/edit_growers')->with("growers_edit", $growers_edit);
		}
		catch (\Exception $e)
		{
	   	 	echo $e->getmessage();
			return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}
	public function updategrowers()
	{
		try{
			//echo "kdf";die;
			$p_CompanyName=$request->CompanyName;
			$p_ContactName=$request->ContactName;
			$p_ContactTitle=$request->ContactTitle;
			$p_Address=$request->Address;
			$p_City=$request->City;
			$p_Region=$request->Region;
			$p_PostalCode=$request->PostalCode;
			$p_Country=$request->Country;
			$p_Phone=$request->Phone;
			$p_Fax=$request->Fax;
			$p_HomePage=$request->HomePage;
			$p_Email=$request->Email;
			$p_CompanyUCCprefix=$request->CompanyUCCprefix;
			$p_SupplierID='';
			$updated_grower=DB::update('call USP_Suppliers_Update(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($p_CompanyName,$p_ContactName,$p_ContactTitle,$p_Address,$p_City,$p_Region,$p_PostalCode,$p_Country,$p_Phone,$p_Fax,$p_HomePage,$p_Email,$p_CompanyUCCprefix,$p_SupplierID));

			return view('admin/growers');
		}
		catch (\Exception $e)
		{
	   	 	echo $e->getmessage();
			return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}

	public function save_and_moregrowers()
	{
		try{
			$p_CompanyName=$request->CompanyName;
			$p_ContactName=$request->ContactName;
			$p_ContactTitle=$request->ContactTitle;
			$p_Address=$request->Address;
			$p_City=$request->City;
			$p_Region=$request->Region;
			$p_PostalCode=$request->PostalCode;
			$p_Country=$request->Country;
			$p_Phone=$request->Phone;
			$p_Fax=$request->Fax;
			$p_HomePage=$request->HomePage;
			$p_Email=$request->Email;
			$p_CompanyUCCprefix=$request->CompanyUCCprefix;
			$p_SupplierID='';
			DB::insert('call USP_Suppliers_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($p_CompanyName,$p_ContactName,$p_ContactTitle,$p_Address,$p_City,$p_Region,$p_PostalCode,$p_Country,$p_Phone,$p_Fax,$p_HomePage,$p_Email,$p_CompanyUCCprefix,$p_SupplierID));
			return redirect('admin/save_and_more_growers');
		}
		catch (\Exception $e)
		{
	   	 	//echo $e->getmessage();
			return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}
}
