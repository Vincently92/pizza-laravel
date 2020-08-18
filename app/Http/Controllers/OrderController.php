<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     * Get a orders od user
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $orders = Order::query()->where('user_id', Auth::user()->id)->get()->toArray();
        foreach ($orders as &$order){
            $order['total'] = 0;
            $order['purchases'] = Purchase::query()->where('order_id', $order['id'])->get()->toArray();
            foreach ($order['purchases'] as &$purchase){
                $order['total'] += $purchase['quantity'] * $purchase['price'];
                $purchase['product'] = Product::query()->where('id', $purchase['product_id'])->get()->toArray()[0];
            }
        }

        return response($orders);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $response = [];

        $find = User::query()->where('email', $request->input('email'))->get()->toArray();
        if(!$find){
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $response['password'] = $password = random_int(1, 999999);
            $user->password = Hash::make($password);
            $user->save();
            Auth::user($user);
            $accessToken = $user->createToken('authToken')->accessToken;
            $response['accessToken'] = $accessToken;

            $order->user_id = $user->id;
        }else{
            $order->user_id = $find[0]['id'];
        }


        $order->status = 'new';
        $order->deliveryPrice = $request->input('deliveryPrice');
        $order->address = $request->input('address');
        $order->currency = $request->input('currency');
        $order->city = $request->input('city');
        $order->comment = $request->input('comment');
        $order->save();
        $response['orderId'] = $order->id;

        if($request->input('purchases')){
            foreach ($request->input('purchases') as $p){
                $purchase = new Purchase;
                $purchase->order_id = $order->id;
                $purchase->product_id = $p['item']['id'];
                $purchase->price = $p['item']['price'][$request->input('currency')];
                $purchase->quantity = $p['quantity'];
                $purchase->save();
            }
        }

        return response($response);
    }
}
