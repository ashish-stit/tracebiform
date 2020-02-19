<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewPlantApplication extends Controller
{

 private function respondWithError($code, $message, $data)
	{
	return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
	}

public function getform(Request $request)
{
	try
	{
		$p_SupplierID='4';
		$pesticides_data=DB::select('call USP_Pesticides_All');
   		$application_data=DB::select('call USP_FarmFieldPlants_GetLastPlantFarmFields(?)',[$p_SupplierID]);
   		
   		$pest_data=DB::select('call USP_Pests_All');
		 return view('admin/applicationform',["application_data"=> $application_data,"pesticides_data"=>$pesticides_data,"pest_data" =>$pest_data]);

	}
	catch (\Exception $e)

	   	{
	   		echo $e->getmessage();
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
}
public function application(Request $request)
{
   try
    	{
	    	if ($request->isMethod('post') && $request->ajax()) {
	        $posts = $request->post();
	        $single_id = $posts['applicationid'];
	        $data=DB::select('select * from pesticides where PesticideID='.$single_id);
	        $pro_id=$data;
	    }
    if ($pro_id) 
    {  
     return response()->json(array('message' => 'success', 'pro_id' => $pro_id));

    } 
	  else 
    {
        return response()->json(array('error' => 'Something went wrong!!'));
    }

	}
	catch (\Exception $e)

	   	{
	   		echo $e->getmessage();
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}
}
public function getpetsdata(Request $request)
{
try
    {
	    if ($request->isMethod('post') && $request->ajax())
	    	 {
	        $posts = $request->post();
	        $petsid = $posts['petsid'];
	        $data=DB::select('select * from pests where PestID='.$petsid);
	        $pro_id=$data;
	    }
    if ($pro_id) 
    {  
     return response()->json(array('message' => 'success', 'pro_id' => $pro_id));

    } 
	  else 
    {
        return response()->json(array('error' => 'Something went wrong!!'));
    }

	}
	catch (\Exception $e)

   	{
   		echo $e->getmessage();
	   return $this->respondWithError(500,"Internal Server Error!",array());
	}

}
public function saveformdata(Request $request)
{
	try
	{	
		$p_FarmFieldPlantID =$request->GrowerFieldID;
		$p_PesticideID = $request->PesticideName;
		$p_TotalAcres = $request->TotalAcres;
		$p_DateTimeSprayed = $request->DateTimeSprayed;
		$p_WindSpeed = $request->WindSpeed;
		$p_WindDirection = $request->WindDirection;
		$p_FieldScheduledReEnterTime = $request->FieldScheduledReEnterTime;
		$p_GPAToBEUsed = $request->GPAToBEUsed;
		$p_ActualGPASprayed = '';
		$p_Comments = $request->Comments;
		$p_FarmFieldApplicationID = '';

		DB::insert('call USP_FarmFieldApplications_Insert(?,?,?,?,?,?,?,?,?,?,?)', array($p_FarmFieldPlantID, $p_PesticideID, $p_TotalAcres, $p_DateTimeSprayed, $p_WindSpeed, $p_WindDirection, $p_FieldScheduledReEnterTime, $p_GPAToBEUsed, $p_ActualGPASprayed, $p_Comments, $p_FarmFieldApplicationID));

		$farmfildappids = DB::select('SELECT FarmFieldApplicationID FROM farmfieldapplications ORDER BY FarmFieldApplicationID DESC LIMIT 1');
		$p_FarmFieldApplicationSID = $farmfildappids[0]->FarmFieldApplicationID;
		$p_PestID = $request->petsname;
		$p_FarmFieldApplicationTargetPestID = '';
		DB::insert('call USP_FarmFieldApplicationTargetPests_Insert(?,?,?)', array($p_FarmFieldApplicationSID,$p_PestID,$p_FarmFieldApplicationTargetPestID));
		


		return redirect('admin/newplantapplicationlist');


	}
	catch (\Exception $e)

   	{
   		echo $e->getmessage();
	   return $this->respondWithError(500,"Internal Server Error!",array());
	}
}

public function newapplist()
{
	try
	{
		$applistview = DB::select('call USP_FarmFieldApplications_All');
		return view('admin/newplantapplicationlist', ['applistview' => $applistview]);
	}
	catch (\Exception $e)

   	{
   		echo $e->getmessage();
	   return $this->respondWithError(500,"Internal Server Error!",array());
	}
}

public function removenewapp($FarmFieldApplicationID)
{
	try
	{
		DB::delete('call USP_FarmFieldApplications_Delete(?)', [$FarmFieldApplicationID]);
		return redirect('admin/newplantapplicationlist');
	}
	catch (\Exception $e)

   	{
   		echo $e->getmessage();
	   return $this->respondWithError(500,"Internal Server Error!",array());
	}
}

public function editplantnewapps($FarmFieldApplicationID)
{
	try
	{
	$p_SupplierID='4';
	$pesticidesnew_data=DB::select('call USP_Pesticides_All');
	$applicationnew_data=DB::select('call USP_FarmFieldPlants_GetLastPlantFarmFields(?)',[$p_SupplierID]);
	$pestnew_data=DB::select('call USP_Pests_All');
	$editpestnames = DB::select('call USP_FarmFieldApplicationTargetPests_GetByFarmFieldApplicationID(?)', [$FarmFieldApplicationID]);

	   $newappeditdat = DB::select('call USP_FarmFieldApplications_Get(?)', [$FarmFieldApplicationID]);
	   return view('admin/edit_newplantapp', ['newappeditdat' => $newappeditdat, 'applicationnew_data' => $applicationnew_data, 'pesticidesnew_data' => $pesticidesnew_data, 'pestnew_data' => $pestnew_data, 'editpestnames' => $editpestnames]);
	}
	catch (\Exception $e)

   	{
   		echo $e->getmessage();
	   return $this->respondWithError(500,"Internal Server Error!",array());
	}

}

public function updatenewapplications(Request $request)
{
	try
	{
		$p_FarmFieldPlantID =$request->GrowerFieldID;
		$p_PesticideID = $request->PesticideName;
		//print_r($p_PesticideID);die;
		$p_TotalAcres = $request->TotalAcres;
		$p_DateTimeSprayed = $request->DateTimeSprayed;
		$p_WindSpeed = $request->WindSpeed;
		$p_WindDirection = $request->WindDirection;
		$p_FieldScheduledReEnterTime = $request->FieldScheduledReEnterTime;
		$p_GPAToBEUsed = $request->GPAToBEUsed;
		$p_ActualGPASprayed = '';
		$p_Comments = $request->Comments;
		$p_FarmFieldApplicationID = $request->FarmFieldApplicationID;

		DB::update('call USP_FarmFieldApplications_Update(?,?,?,?,?,?,?,?,?,?,?)', array($p_FarmFieldApplicationID,$p_FarmFieldPlantID, $p_PesticideID, $p_TotalAcres, $p_DateTimeSprayed, $p_WindSpeed, $p_WindDirection, $p_FieldScheduledReEnterTime, $p_GPAToBEUsed, $p_ActualGPASprayed, $p_Comments));

		// $farmfildappids = DB::select('SELECT FarmFieldApplicationID FROM farmfieldapplications ORDER BY FarmFieldApplicationID');
		// $p_FarmFieldApplicationSID = $farmfildappids[0]->FarmFieldApplicationID;
		$p_PestID = $request->petsname;
		//print_r($p_PestID);die;
		$p_FarmFieldApplicationTargetPestID=$request->FarmFieldApplicationTargetPestID;
		DB::update('call USP_FarmFieldApplicationTargetPests_Update(?,?,?)', array($p_FarmFieldApplicationTargetPestID,$p_FarmFieldApplicationID,$p_PestID));

		return redirect('admin/newplantapplicationlist');
	}
	catch (\Exception $e)

   	{
   		echo $e->getmessage();
	   return $this->respondWithError(500,"Internal Server Error!",array());
	}
}

}
