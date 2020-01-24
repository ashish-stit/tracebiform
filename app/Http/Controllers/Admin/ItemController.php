<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use DB;
use Session;
use App\Models\productsupplys;


class ItemController extends Controller
{
		private function respondWithError($code, $message, $data)
		{
			return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
		}
	   public function addItem(Request $request)
	   {
	   	try
	   	{
	   	  $producttypes = DB::select('select * from producttypes');
	   	  $categories = DB::select('select * from categories');
	   	  $supplies = DB::select('select * from supplies');
	   	  return view('admin/addItem',["producttypes"=> $producttypes,"categories"=>$categories,"supplies"=>$supplies]);
	   	}
	   	  catch (\Exception $e)

	   	 {
		   return $this->respondWithError(500,"Internal Server Error!",array());
		}

	   }
	   public function savedata(Request $request)
	   {
	   	try
	   	{
	     $p_ProductCode=$request->productcode;
	   	 $p_ProductName=$request->productname;
	   	 $p_CategoryID = $request->productcategory;
	     $p_QuantityPerPallet=$request->quantityperpallet;
	     $p_PalletType=$request->pallettype;
	     $p_UnitPrice='';
	     $p_Discontinued=$request->discontitued;
	     $p_Brand=$request->brand;
	     $p_Grade=$request->grade;
	     $p_FieldNo='';
	     $p_LotNo='';
	     $p_WarehouseLocation='';
	     $p_productBarCode='';
	     $p_Comments='';
	     $p_Active='';
	     $p_RetailUPCCode=$request->retailcode;
	     $p_ProductWeight=$request->weight;
         $p_VendorUCC=$request->VendorUCC;
         $p_ProductTypeID=$request->wraper;
         $p_ProductID='';
         $p_qry=$request->quantity;
         $ProductSupplyID='';
         DB::insert('call USP_Products_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$p_ProductCode,$p_ProductName,$p_CategoryID,$p_QuantityPerPallet,$p_PalletType,$p_UnitPrice,$p_Discontinued,$p_Brand,$p_Grade,$p_FieldNo,$p_LotNo,$p_WarehouseLocation,$p_productBarCode,$p_Comments,$p_Active,$p_RetailUPCCode,$p_ProductWeight,$p_VendorUCC,$p_ProductTypeID,$p_ProductID]);
            $id=DB::select('SELECT ProductID FROM products ORDER BY ProductID DESC LIMIT 1');
		         for($i=0;$i<count($p_qry);$i++)
		        {
		        	DB::insert('call USP_ProductSupplys_Insert(?,?,?,?)',array($id[0]->ProductID,$p_ProductTypeID,$p_qry[$i],$ProductSupplyID));

		        }
         Session::flash('msg','Product Saved');
         return redirect('Product/Itemselllist');
        }
	        catch (\Exception $e)

		   	{
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}
	   }
	        public function Itemlist(Request $request)
			   {
			   	try
		     	{

		           $products=DB::select('call USP_Products_All');
		           return view('admin/Itemlist')->with("products", $products);
		     	}
		     	catch (\Exception $e)

			   	 {
				   return $this->respondWithError(500,"Internal Server Error!",array());
				}

			}

		public function productdelete($p_ProductID)
		{
				try
				{
					 $product=DB::delete('call USP_Products_Delete(?)',[$p_ProductID]);
					DB::delete('delete from productsupplys where ProductID='.$p_ProductID);
		            Session::flash('msg','Product Deleted');
		            return redirect('Product/Itemselllist');
		        }
		        catch (\Exception $e)

			   	 {
			   	 	echo $e->getmessage();
				   return $this->respondWithError(500,"Internal Server Error!",array());
				}

		}
		public function productedit($p_ProductID)
		{
			try
			{
			 $product_data=DB::select('call USP_Products_Get(?)',[$p_ProductID]);
			$supply_data = DB::select('select * from productsupplys where ProductID='.$product_data[0]->ProductID);
			$data=DB::select('SELECT COUNT(ProductID) as abc FROM  productsupplys  where ProductID='.$p_ProductID);
			$countdata=$data[0]->abc;
			$categories = DB::select('select * from categories');
			$producttypes = DB::select('select * from producttypes');
             return view('admin/productupdate',["product_data"=>$product_data,"supply_data"=>$supply_data,"categories"=>$categories,"producttypes"=>$producttypes,"countdata"=>$countdata]);

			}
			 catch (\Exception $e)

			   	 {
			   	 echo $e->getmessage();
				   return $this->respondWithError(500,"Internal Server Error!",array());
				}
		}
		public function productupdate(Request $request)
		{

			try{
				$p_ProductID=$request->ProductID;
				$data=DB::select('SELECT COUNT(ProductID) as abc FROM  productsupplys  where ProductID='.$p_ProductID);
				$ids=DB::select('select ProductSupplyID as ids from productsupplys where ProductID='.$p_ProductID);
			
            $countdata=$data[0]->abc;
			$p_ProductCode=$request->productcode;
			$p_ProductName=$request->productname;
			$p_CategoryID=$request->productcategory;
			$p_QuantityPerPallet=$request->quantityperpallet;
			$p_PalletType=$request->pallettype;
			$p_UnitPrice='';
			$p_Discontinued=$request->discontitued;
			$p_Brand=$request->brand;
			$p_Grade=$request->grade;
			$p_FieldNo='';
			$p_LotNo='';
			$p_WarehouseLocation='';
			$p_productBarCode='';
			$p_Comments='';
			$p_Active='';
			$p_RetailUPCCode=$request->retailcode;
			$p_ProductWeight=$request->weight;
			$p_VendorUCC=$request->VendorUCC;
			$p_ProductTypeID=$request->producttype;
			$p_SupplyID=$request->producttype;
			$p_qry=$request->quantity;
			DB::update('call USP_Products_Update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($p_ProductID,$p_ProductCode,$p_ProductName,$p_CategoryID,$p_QuantityPerPallet,$p_PalletType,$p_UnitPrice,$p_Discontinued,$p_Brand,$p_Grade,$p_FieldNo,$p_LotNo,$p_WarehouseLocation,$p_productBarCode,$p_Comments,$p_Active,$p_RetailUPCCode,$p_ProductWeight,$p_VendorUCC,$p_ProductTypeID));

			  for($i=0;$i<count($p_qry);$i++)
		        {
		        	 $p_ProductSupplyID=$ids[0]->ids;
                        
                        if($i<$countdata)
			        	{

			        	DB::update('call USP_ProductSupplys_Update(?,?,?,?)',array($p_ProductSupplyID,$p_ProductID,$p_SupplyID,$p_qry[$i]));
			           }
		        else
		        {
		        	DB::insert('call USP_ProductSupplys_Insert(?,?,?,?)',array($p_ProductID,$p_SupplyID,$p_qry[$i],$p_ProductSupplyID));
		        	
		        }
		    

		        
		}
			Session::flash('msg','Product Updated');
		     return redirect('Product/Itemselllist');
		}
		catch (\Exception $e)

			   	 {
			   	 echo $e->getmessage();
				   return $this->respondWithError(500,"Internal Server Error!",array());
				}
	}


}
