<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderTrackingResource;
use App\Http\Resources\SuccessResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $orderNumber    =   $this->generateOrderNo();
            $request->merge(["order_no"=>$orderNumber,"user_id"=>1]);
            $order          =   Order::create($request->all());
            return SuccessResource::make([]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return SuccessResource::make(['data'=>$order]);
    }
    /**
     * Display the specified resource.
     */
    public function trackOrderDetail($order_no)
    {
        $data   =   Order::where("order_no",$order_no)->first();
        return OrderTrackingResource::make($data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        try {
            $order->update($request->all());
            return SuccessResource::make(['data'=>$order]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function generateOrderNo(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomKey = substr(str_shuffle($characters), 0, 16);
        
        $order  =   Order::where("order_no",$randomKey)->first();
        if($order){
            return Self::generateOrderNo();
        }
        return $randomKey;
    }
}
