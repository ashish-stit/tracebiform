<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PtiController extends Controller
{
   private function respondWithError($code, $message, $data)
	{
		return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
	}
   public function addpost(Request $request)
   {
   	try
   	{
     //     $request->growers;
     //     $request->lot;
     //     $request->product;
   		// $value=$request->quantitytoprint;
       
   	}
   	catch (\Exception $e)
   	 {
	   return $this->respondWithError(500,"Internal Server Error!",array());
	}
   }
}
