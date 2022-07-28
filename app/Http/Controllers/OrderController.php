<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    //

    public function index(){
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order){
        $this->authorize('author', $order);
        //$this->authorize('payment', $order);
        $items = json_decode($order->content);
        return view('orders.show', compact('order','items'));
    }

    public function payment(Order $order){
        $items = json_decode($order->content);
        return view('orders.payment', compact('order', 'items'));
    }

    public function pay(Order $order, Request $request){
        $this->authorize('author', $order);
        $this->authorize('payment', $order);
        //return $request->all();
        $payment_id = $request->get('payment_id');
        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-4883205259792035-041904-9e5e895b7c98f337a66bd87823cde6ab-1109208866");
        $response = json_decode($response);
        $status = $response->status;

        if($status == "approved"){
            $order->status = 2;
            $order->save();
            return redirect()->route('orders.show', $order);
        }else{
            //dd($status);
            //VALIDAR ESTE CODIGO. VERIFICAR QUE LA VENTA SI FUE EFECTIVA
            $order->status = 2;
            $order->save();
            return redirect()->route('orders.show', $order);
        }
    }
}
/*
{"collection_id":"1248767735",
"collection_status":"approved",
"payment_id":"1248767735",
"status":"approved",
"external_reference":"null",
"payment_type":"credit_card",
"merchant_order_id":"4869291094",
"preference_id":"1109208866-0fd517e7-bd56-47bf-9716-b8c32ddd42d6",
"site_id":"MCO",
"processing_mode":"aggregator",
"merchant_account_id":"null"}*/
