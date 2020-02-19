<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class WharehouseController extends Controller
{
	 private function respondWithError($code, $message, $data)
		{
			return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
		}
    public function showform(Request $request)
    {
    	try
    	{
            $order_data=DB::select('call USP_PurchaseOrders_All');
    		$TransactionType=DB::select('Call USP_InventoryTransactionTypes_All');

    		$product_data=DB::select('call USP_Products_All');
    		$p_ProductID=$product_data[0]->ProductID;
    		$product_supply_data=DB::select('call USP_ProductSupplys_GetByProductID(?)',[$p_ProductID]);

    		$supplier_data=DB::select('call USP_Suppliers_All');
    		$p_SupplierID=$supplier_data[0]->SupplierID;
            $Getlotno_data=DB::select('call USP_FarmFieldPlants_GetLotNoBySupplierID(?)',[$p_SupplierID]);
            $prosingle_data=DB::select('call USP_Products_Get(?)',[$p_ProductID]);
           		 return view('admin/addsingle_wharehouse',["TransactionType"=> $TransactionType,"product_data"=>$product_data,"supplier_data"=>$supplier_data,"Getlotno_data" =>$Getlotno_data,"prosingle_data" =>$prosingle_data,"product_supply_data"=>$product_supply_data,"order_data"=>$order_data
           		]);

    	}
    	catch (\Exception $e)

		   	{
		   		echo $e->getmessage();
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}
    }
    public function getid(Request $request)
    {
	    	try
	    	{
		    	if ($request->isMethod('post') && $request->ajax()) {
		        $posts = $request->post();
		        $single_id = $posts['singleid'];
		        $data=DB::select('select * from productsupplys where ProductID='.$single_id); 
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
    public function savedata(Request $request)
    {
    	try
    	{
    		$p_InventoryTransactionID='';
    		$p_InventoryTransactionTypeID=$request->InventoryTransactionTypeID;
    		$p_ProductID=$request->ProductID;
    		$p_TransactionDescription='';
    		$p_WareHouseLocation=$request->WareHouseLocation;
			$p_UnitPrice='';
			$p_Quantity=$request->qty;
			$p_LotNo=$request->LotNo;
			$p_PalletType=$request->PalletType;
			$p_PackUnitType='';
			$p_TransactionDate=$request->TransactionDate;
			$p_CreatedBy=$request->CreatedBy;
			$p_OrderDetailID='';
			$p_SupplierID=$request->SupplierID;
            $p_ProducedInventoryID='3';
			$p_GrowerID=$request->GrowerId;
			$p_GTIN=$request->GTIN;
			$p_BillofLadingOrderID='';
			$p_SupplyID=$request->supp;
			$p_Qut=$request->qry;
			$p_OrderID='1';
			$p_SupplyInventoryID='2';
			$p_SupplyInventoryTypeID='3';

			DB::insert('call USP_InventoryTransactions_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($p_InventoryTransactionTypeID,$p_ProductID,$p_TransactionDescription,$p_WareHouseLocation,$p_UnitPrice,$p_Quantity,$p_LotNo,$p_PalletType,$p_PackUnitType,$p_TransactionDate,$p_CreatedBy,$p_OrderDetailID,$p_SupplierID,$p_ProducedInventoryID,$p_GrowerID,$p_GTIN,$p_BillofLadingOrderID,$p_InventoryTransactionID));
			for($i=0;$i<count($p_Qut);$i++)
		        {
		        	DB::insert('call USP_SupplyInventories_Insert(?,?,?,?,?,?,?,?,?)', array($p_SupplyInventoryTypeID,$p_SupplyID[$i],$p_TransactionDescription,$p_Qut[$i],$p_TransactionDate,$p_CreatedBy,$p_OrderID,$p_SupplierID,$p_SupplyInventoryID));

		        }
    		
		        return redirect('admin/singlelist');
    	}
    	catch (\Exception $e)

		   	{
		   		echo $e->getmessage();
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}
    }
    public function singlelist(Request $request)
    {
    	try
    	{
    		$p_SupplierID="4";
    		$single_data=DB::select('call USP_InventoryTransactions_All(?)',[$p_SupplierID]);
    		//print_r($single_data);die;
    		
    		return view('admin/singlelist')->with('single_data',$single_data);

    	}
    	catch (\Exception $e)

		   	{
		   		echo $e->getmessage();
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}


    }
    public function deletedata($InventoryTransactionID)
    {
    	try
    	{
    		$deleteInventry = DB::select('call USP_InventoryTransactions_Delete(?)', [$InventoryTransactionID]);
    		//print_r($deleteInventry);die;
    		return view('admin/singlelist');
    	}
    	catch (\Exception $e)

		   	{
		   		echo $e->getmessage();
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}

    }
    public function editdata($InventoryTransactionID)
    {
    	try
    	{
    		$supplier_data=DB::select('call USP_Suppliers_All');
    		$p_SupplierID=$supplier_data[0]->SupplierID;
    		$EditTransType=DB::select('Call USP_InventoryTransactionTypes_All');
    		$Editproduct_data=DB::select('call USP_Products_All');
    		$Editsupplier_data=DB::select('call USP_Suppliers_All');
    		$EditGetlotno_data=DB::select('call USP_FarmFieldPlants_GetLotNoBySupplierID(?)',[$p_SupplierID]);

    		$EditInventrytrans = DB::select('call USP_InventoryTransactions_Get(?)', [$InventoryTransactionID]);
    							
    		return view('admin/edit_signlewarehouse', ['EditTransType' => $EditTransType, 'Editproduct_data' => $Editproduct_data, 'Editsupplier_data' => $Editsupplier_data, 'EditGetlotno_data' => $EditGetlotno_data, 'EditInventrytrans' => $EditInventrytrans]);
    	}
    	catch (\Exception $e)

		   	{
		   		echo $e->getmessage();
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}
    }
    public function updateinvtrans(Request $request)
    {
    	try
    	{
    		
    		$p_InventoryTransactionTypeID=$request->InventoryTransactionTypeID;
    		$p_ProductID='5';
    		$p_TransactionDescription='';
    		$p_WareHouseLocation=$request->WareHouseLocation;
			$p_UnitPrice='';
			$p_Quantity=$request->qty;
			$p_LotNo=$request->LotNo;
			$p_PalletType=$request->PalletType;
			$p_PackUnitType='';
			$p_TransactionDate=$request->TransactionDate;
			$p_CreatedBy=$request->CreatedBy;
			$p_OrderDetailID='';
			$p_SupplierID=$request->SupplierID;
			$p_ProducedInventoryID='';
			$p_GrowerID=$request->SupplierID;
			$p_GTIN=$request->GTIN;
			$p_BillofLadingOrderID='';
			$p_SupplyID=$request->supp;
			$p_Qut=$request->qry;
			$p_OrderID='1';
			$p_SupplyInventoryID='2';
			$p_SupplyInventoryTypeID='3';
			$p_InventoryTransactionID=$request->InventoryTransactionID;

			$updataData = DB::update('call USP_InventoryTransactions_Update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($p_InventoryTransactionID,$p_InventoryTransactionTypeID,$p_ProductID,$p_TransactionDescription,$p_WareHouseLocation,$p_UnitPrice,$p_Quantity,$p_LotNo,$p_PalletType,$p_PackUnitType,$p_TransactionDate,$p_CreatedBy,$p_OrderDetailID,$p_SupplierID,$p_ProducedInventoryID,$p_GrowerID,$p_GTIN,$p_BillofLadingOrderID));
			
			print_r($updataData);die;

			for($i=0;$i<count($p_Qut);$i++)
		        {
		        	DB::update('call USP_SupplyInventories_Update(?,?,?,?,?,?,?,?,?)', array($p_SupplyInventoryID,$p_SupplyInventoryTypeID,$p_SupplyID[$i],$p_TransactionDescription,$p_Qut[$i],$p_TransactionDate,$p_CreatedBy,$p_OrderID,$p_SupplierID));

		        }
    		
		        return redirect('admin/singlelist');
    	}
    	catch (\Exception $e)
    	{
    		echo $e->getmessage();
    		return $this->respondWithError(500, "Internal Server Error!",array());
    	}
    }

}
