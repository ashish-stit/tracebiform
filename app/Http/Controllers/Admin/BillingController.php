<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class BillingController extends Controller
{
private function respondWithError($code, $message, $data)
{
return response()->json(array('code'=>$code,'message'=>$message,'data'=>$data));
}
public function showform(Request $request)
{
try
{
$p_SupplierID="0";
$customers_data=DB::select('select * from customers');
$orderdetail_data=DB::select('select * from orderdetails');
$order_data=DB::select('call USP_Orders_All(?)',[$p_SupplierID]);
return view('admin/billingform',["order_data" =>$order_data,"customers_data" =>$customers_data,"orderdetail_data"=>$orderdetail_data]);

}
catch (\Exception $e)

{
echo $e->getmessage();
return $this->respondWithError(500,"Internal Server Error!",array());
}
}
public function getorderid(Request $request)
{
try
{
if ($request->isMethod('post') && $request->ajax())
{
$posts = $request->post();
$order_id = $posts['orderid'];
$data=DB::select('select * from orderdetails where OrderID='.$order_id);
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
public function inventoryid(Request $request)
{
try
{
if ($request->isMethod('post') && $request->ajax())
{
$posts = $request->post();
$inventory_id = $posts['inventoryid'];
$data=DB::select('call usp_GetInventoryTransactionsByInventoryTransactionID(?)',[$inventory_id]);

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

	public function getbillingdata()
	{
		try
		{
		$getcustomername = DB::select('call USP_Customers_All');
		$getcustpono = DB::select('call USP_PurchaseOrders_All');
		$p_SupplierID = 0;
		$databilling = DB::select('call USP_BillofLadings_All(?)', [$p_SupplierID]);
		return view('admin/billsofladinglist', ['databilling' => $databilling, 'getcustomername' => $getcustomername, 'getcustpono' => $getcustpono]);
		}
		catch (\Exception $e)

		{
		echo $e->getmessage();
		return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}
public function savebillslading(Request $request)
{
		try
		{

			$OrdersID= DB::select('SELECT OrderID FROM orders ORDER BY OrderID DESC LIMIT 1');
			$p_OrderID = $OrdersID[0]->OrderID;
			$p_LoadNumber=$request->loadnumber;
			$p_CreatedDate='';
			$p_TruckingCompany=$request->TruckingCompany;
			$p_Driver=$request->Driver;
			$p_DriverLicenseNo=$request->DriverLicenseNo;
			$p_ShipDate=$request->ShipDate;
			$p_ShipTo=$request->ShipTo;
			$p_ShipPO='';
			$p_DelDate='';
			$p_DeliveryInstructions=$request->DeliveryInstructions;
			$p_TemperatureInstructions='';
			$p_DriverInstructions='';
			$p_KeepUnitAt=$request->KeepUnitAt;
			$p_Truck='';
			$p_TruckBroker=$request->TruckBroker;
			$p_FreightRate=$request->DelConfirmationNumber;
			$p_TrailerLicenseNumber=$request->TrailerLicenseNumber;
			$p_LoadAt=$request->loadat;
			$p_PalletsIn=$request->PalletsIn;
			$p_PalletsOut=$request->PalletsOut;
			$p_ShipToPONumber=$request->ShiptoPONo;
			$p_Total50LBBags=$request->TotalPallets;
			$p_DelTime='';
			$p_BillofLadingID='';

			DB::insert('call USP_BillofLadings_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array($p_OrderID,$p_LoadNumber,$p_CreatedDate,$p_TruckingCompany,$p_Driver,$p_DriverLicenseNo,$p_ShipDate,$p_ShipTo,$p_ShipPO,$p_DelDate,$p_DeliveryInstructions,$p_TemperatureInstructions,$p_DriverInstructions,$p_KeepUnitAt,$p_Truck,$p_TruckBroker,$p_FreightRate,$p_TrailerLicenseNumber,$p_LoadAt,$p_PalletsIn,$p_PalletsOut,$p_ShipToPONumber,$p_Total50LBBags,$p_DelTime,$p_BillofLadingID));
			return redirect('admin/billsofladinglist');
		}
		catch (\Exception $e)

		{
		echo $e->getmessage();
		return $this->respondWithError(500,"Internal Server Error!",array());
		}
	}

public function removebillslading($BillofLadingID)
{
try
{
 DB::select('call USP_BillofLadings_Delete(?)', [$BillofLadingID]);
 return redirect('admin/billsofladinglist');
}
catch (\Exception $e)

{
echo $e->getmessage();
return $this->respondWithError(500,"Internal Server Error!",array());
}
}

public function billedit($BillofLadingID)
{
	try
	{
		$p_SupplierID=0;
		$orders_datas=DB::select('call USP_Orders_All(?)',[$p_SupplierID]);
		$odrdetails_datas=DB::select('select * from orderdetails');
		$cust_datas=DB::select('select * from customers');
		$ladingeditdat = DB::select('call USP_BillofLadings_Get(?)', [$BillofLadingID]);
		return view('admin/editbillslading', ['ladingeditdat' => $ladingeditdat, 'orders_datas' => $orders_datas, 'odrdetails_datas' => $odrdetails_datas, 'cust_datas' => $cust_datas]);
		
	}
	catch (\Exception $e)
	{
	echo $e->getmessage();
	return $this->respondWithError(500,"Internal Server Error!",array());
	}
}

public function updlading(Request $request)
{
	try
	{
		
				$p_OrderID = $request->OrderID;
				$p_LoadNumber=$request->loadnumber;
				$p_CreatedDate='';
				$p_TruckingCompany=$request->TruckingCompany;
				$p_Driver=$request->Driver;
				$p_DriverLicenseNo=$request->DriverLicenseNo;
				$p_ShipDate=$request->ShipDate;
				$p_ShipTo=$request->ShipTo;
				$p_ShipPO='';
				$p_DelDate='';
				$p_DeliveryInstructions=$request->DeliveryInstructions;
				$p_TemperatureInstructions='';
				$p_DriverInstructions='';
				$p_KeepUnitAt=$request->KeepUnitAt;
				$p_Truck='';
				$p_TruckBroker=$request->TruckBroker;
				$p_FreightRate=$request->DelConfirmationNumber;
				$p_TrailerLicenseNumber=$request->TrailerLicenseNumber;
				$p_LoadAt=$request->loadat;
				$p_PalletsIn=$request->PalletsIn;
				$p_PalletsOut=$request->PalletsOut;
				$p_ShipToPONumber=$request->ShiptoPONo;
				$p_Total50LBBags=$request->TotalPallets;
				$p_DelTime='';
				$p_BillofLadingID=$request->BillofLadingID;

            $billsupdatedata = DB::update('call USP_BillofLadings_Update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array($p_BillofLadingID,$p_OrderID,$p_LoadNumber,$p_CreatedDate,$p_TruckingCompany,$p_Driver,$p_DriverLicenseNo,$p_ShipDate,$p_ShipTo,$p_ShipPO,$p_DelDate,$p_DeliveryInstructions,$p_TemperatureInstructions,$p_DriverInstructions,$p_KeepUnitAt,$p_Truck,$p_TruckBroker,$p_FreightRate,$p_TrailerLicenseNumber,$p_LoadAt,$p_PalletsIn,$p_PalletsOut,$p_ShipToPONumber,$p_Total50LBBags,$p_DelTime));
				
				return redirect('admin/billsofladinglist');
				}
			catch (\Exception $e)
			{
			echo $e->getmessage();
			return $this->respondWithError(500,"Internal Server Error!",array());
			}
	}
}
