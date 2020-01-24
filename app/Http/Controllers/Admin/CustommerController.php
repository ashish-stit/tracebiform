<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use DB;
use Session;

class CustommerController extends Controller
{
    private function respondWithError($code, $message, $data)
	{
		return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
	}
     public function addform(Request $request)
     {
     	return view('admin/addcustomer');

     }
     public function addcustomer(Request $request)
     {
     	try{
     	$p_CustomerCode=$request->customercode;
     	$p_ContactTitle=$request->contacttitle;
        $p_City=$request->city;
     	$p_Country=$request->country;
     	$p_Email=$request->email;
		$p_CompanyName=$request->companyname;
	    $p_Address=$request->address;
	    $p_Region=$request->state;
	    $p_Phone=$request->phone;
	    $p_CreatedDate=$request->date;
	    $p_ContactName=$request->contact;
		$p_Address2=$request->address2;
	    $p_PostalCode=$request->postalcode;
	    $p_Fax=$request->fax;
	    $p_CustomerID='';

	    DB::insert('call USP_Customers_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$p_CustomerCode,$p_CompanyName,$p_ContactName,$p_ContactTitle,$p_Address,$p_City,$p_Region,$p_PostalCode,$p_Country,$p_Phone,$p_Fax,$p_CreatedDate,$p_Email,$p_Address2,$p_CustomerID]);
	     Session::flash('msg','Customer Saved');
             return redirect('customer/list');

       }
       catch (\Exception $e)

	   	 {
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}

     }
     public function getdata(Request $request)
     {
     	try
     	{

           $customers=DB::select('call USP_Customers_All');
           return view('admin/customerlist')->with("customers", $customers);
     	}
     	catch (\Exception $e)

	   	 {
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
     }
     public function deletedata($p_CustomerID)
	{
		try
		{
		 $users=DB::delete('call USP_Customers_Delete(?)',[$p_CustomerID]);
    	   Session::flash('msg','Customer deleted');
           return redirect('customer/list');
       }
       catch (\Exception $e)

	   	 {
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}

	}
	public function editdata($p_CustomerID)
	{
		
		$customer_data = DB::select('call USP_Customers_Get(?)',[$p_CustomerID]);
     	return view('admin/customeredit')->with('customer_data',$customer_data);

	}
	public function Customerupdatedata(Request $request)
	{
		try
		{
			$p_CustomerID=$request->CustomerID;
			$p_CustomerCode=$request->customercode;
			$p_CompanyName=$request->companyname;
			$p_ContactName=$request->contactname;
			$p_ContactTitle=$request->contacttitle;
			$p_Address=$request->address;
			$p_City=$request->city;
			$p_Region=$request->state;
			$p_PostalCode=$request->postalcode;
			$p_Country=$request->country;
			$p_Phone=$request->phone;
			$p_Fax=$request->fax;
			$p_CreatedDate=$request->date;
			$p_Email=$request->email;
			$p_Address2=$request->address2;
			DB::update('call USP_Customers_Update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$p_CustomerID,$p_CustomerCode,$p_CompanyName,$p_ContactName,$p_ContactTitle,$p_Address,$p_City,$p_Region,$p_PostalCode,$p_Country,$p_Phone,$p_Fax,$p_CreatedDate,$p_Email,$p_Address2]);
			 Session::flash('msg','Customer updated');
             return redirect('customer/list');
        }
		catch (\Exception $e)

	   	 {
	   	 	echo $e->getmessage();
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}
}
