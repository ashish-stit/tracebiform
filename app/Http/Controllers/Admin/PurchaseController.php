<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class PurchaseController extends Controller
{
    private function respondWithError($code, $message, $data)
		{
			return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
		}
		public function showform(Request $request)
		{
			try
			{
			  $customer_data=DB::select('call USP_Customers_All');
			  $Suppliers_data=DB::select('call USP_Suppliers_All');
			  $Terms_data=DB::select('call USP_Terms_All');
			  $Shipping_data=DB::select('call USP_ShippingMethods_All');
			  $Shippers_data=DB::select('call USP_Shippers_All');
			  $Products_data=DB::select('call USP_Products_All');
			  return view('admin/addpurchaseorder',["customer_data"=> $customer_data,"Suppliers_data"=>$Suppliers_data,"Terms_data"=>$Terms_data,"Shipping_data"=>$Shipping_data,"Shippers_data"=>$Shippers_data,"Products_data"=>$Products_data]);
		    }
			catch (\Exception $e)

		   	{
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}
		}
		public function addorder(Request $request)
		{
			try
			{
				$p_PurchaseOrderID='';
				$p_PurchaseOrderNumber=$request->purchaseordernumber;
				$p_CustomerID=$request->customer;
				$p_PurchaseOrderDescription='';
				$p_OrderDate=$request->orderdate;
				$p_DateRequired=$request->daterequired;
				$p_DatePromised=$request->datepromised;
				$p_ShipDate=$request->shipdate;
				$p_ShippingMethodID=$request->shippingmethod;
				$p_ShipToID=$request->shipto;
				$p_ShipAddress=$request->shiptoaddress1;
				$p_ShipCity=$request->shiptocity;
				$p_ShipRegion=$request->shiptostate;;
                $p_ShipPostalCode=$request->shiptopostalcode;
          		$p_ShipCountry=$request->shiptocountry;
    			$p_ShipPhone=$request->shiptophone;
    		    $p_FreightCharge=$request->charge;
                $p_PurchaseOrderStatusID='';
      			$p_TermID=$request->terms;
      			$p_TransportationBrokerID=$request->Transpotation;
      			$p_TransportationConfirmNumber=$request->number;
      			$p_Address=$request->invoicetoaddress;
      			$p_City=$request->invoicetocity;
      			$p_Region=$request->invoicetoregion;
      			$p_Zip=$request->invoicetozip;
      			$p_Phone=$request->invoicetophone;
      			$p_Drop=$request->drop;
      			$p_CustomerRate=$request->customerrate;
      			$p_FreightDeductions=$request->deduction;
      			$p_JacketNotes='';
      			$p_ShipToPONumber=$request->shiptopono;
      			$p_SupplierID=$request->suppliers;
      			$p_SupplierID=$request->supply;
      			$p_LoadNumber=$request->loadnumber;
	            $p_LoadAt=$request->loadat;
	            $p_ShipAddress2=$request->shiptocountry;
				$p_ProductID=$request->productname;
				$p_UnitPrice=$request->unitprice;
				$p_Quantity=$request->quantity;
				$p_Discount=$request->brand;
				$p_PalletType=$request->pallettype;
				$p_PurchaseOrderDetailID='';
				DB::insert('call USP_PurchaseOrders_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$p_PurchaseOrderNumber,$p_CustomerID,$p_PurchaseOrderDescription,$p_OrderDate,$p_DateRequired,$p_DatePromised,$p_ShipDate,$p_ShippingMethodID,$p_ShipToID,$p_ShipAddress,$p_ShipCity,$p_ShipRegion,$p_ShipPostalCode,$p_ShipCountry,$p_ShipPhone,$p_FreightCharge,$p_PurchaseOrderStatusID,$p_TermID,$p_TransportationBrokerID,$p_TransportationConfirmNumber,$p_Address,$p_City,$p_Region,$p_Zip,$p_Phone,$p_Drop,$p_CustomerRate,$p_FreightDeductions,$p_JacketNotes,$p_ShipToPONumber,$p_SupplierID,$p_LoadNumber,$p_LoadAt,$p_ShipAddress2,$p_PurchaseOrderID]);
				   $ID=DB::select('SELECT PurchaseOrderID FROM purchaseorders ORDER BY PurchaseOrderID DESC LIMIT 1');
				   $p_PurchaseOrd=$ID[0]->PurchaseOrderID;
				    for($i=0;$i<count($p_Quantity);$i++)
		        {
		        	DB::insert('call USP_PurchaseOrderDetails_Insert(?,?,?,?,?,?,?)',array($p_PurchaseOrderDetailID,$p_PurchaseOrd,$p_ProductID[$i],$p_UnitPrice[$i],$p_Quantity[$i],$p_Discount[$i],$p_PalletType[$i]));

		        }
                Session::flash('msg','Order Saved');
                return redirect('purchase/list');


			}
			catch (\Exception $e)

		   	{
		   		echo $e->getmessage();
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}
		}
		public function getform(Request $request)
		{
			try{
				$order_data=DB::select('call USP_PurchaseOrders_All');
				return view('admin/purchaselist')->with('order_data',$order_data);

			}
			catch (\Exception $e)

		   	{
		   		echo $e->getmessage();
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}

		}
		public function orderdelete($p_PurchaseOrderID)
		{
			try
			{
				DB::delete('call USP_PurchaseOrders_Delete(?)',[$p_PurchaseOrderID]);
				DB::delete('call USP_PurchaseOrderDetails_DeleteByPurchaseOrderID(?)',[$p_PurchaseOrderID]);
				DB::delete('delete from purchaseorderdetails where ProductID='.$p_PurchaseOrderID);
				Session::flash('msg','OrderDeleted');
				return redirect('purchase/list');
            }
			catch (\Exception $e)

		   	{
		   		echo $e->getmessage();
			   return $this->respondWithError(500,"Internal Server Error!",array());
			}
		}
}

	