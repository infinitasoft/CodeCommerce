<?php

namespace CodeCommerce\Http\Controllers\Store;

use Illuminate\Http\Request;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if(!Session::has('cart')) {
            return false;
        }

        $cart = Session::get('cart');

        if($cart->getTotal()> 0) {
            // Se o valor do cart for maior que 0, criar uma "Order"
            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal()]);

            foreach($cart->all() as $k=>$item) {

                $order->items()->create(['product_id'=>$k, 'price'=>$item['price'],'qtd'=>$item['qtd']]);
            }

            dd($order);
        }
    }
}
