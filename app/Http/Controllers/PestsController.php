<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class PestsController extends Controller
{

    public function storepests(Request $request)
    {
    	$p_PestName=$request->PestName;
    	$p_Description=$request->Description;
    	$p_PestID='';

    	DB::insert('call USP_Pests_Insert(?,?,?)',array($p_PestName,$p_Description,$p_PestID));
        Session::flash('msg','Pests Added');
    	return redirect('admin/pests');
    }
    public function addform()
    {
        return view('admin/addpest');
    }
    public function getpests(){
    	$pests_get=DB::select('call USP_Pests_All');
    	return view('admin/pests')->with("pests_get",$pests_get);
    }
    public function removepests($PestID){
    	$trash=DB::delete('call USP_Pests_Delete(?)',[$PestID]);
        Session::flash('msg','Pests Deleted');
    	return redirect('admin/pests');

    }
    public function editpests($PestID){
        
        $pests_edit=DB::select('call USP_Pests_Get(?)',[$PestID]);
    	return view('admin/edit_pests')->with("pests_edit", $pests_edit);

    }
    public function pestsupdate(Request $request){
        $p_PestID=$request->PestID;
        $p_PestName=$request->PestName;
        $p_Description=$request->Description;
        DB::update('call USP_Pests_Update(?,?,?)',[$p_PestID,$p_PestName,$p_Description]);
         Session::flash('msg','Pests Updated');
        return redirect('admin/pests');

    }
}

