<?php

namespace CodeCommerce\Http\Controllers\Store;

use Illuminate\Http\Request;
use CodeCommerce\Cart;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{
    private $cart;

    /**
     * CartController constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        if(!Session::has('cart')) {
            Session::set('cart',$this->cart);
        }
        return view('store.cart', ['cart'=> Session::get('cart')]);
    }
    public function add($id)
    {

        $cart = $this->getCart();

        $product = Product::find($id);
        $cart->add($id, $product->name, $product->price);
        Session::set('cart',$cart);
        return redirect()->route('store.cart');
    }

    public function destroy($id)
    {
        $cart = $this->getCart();

        $cart->remove($id);

        Session::set('cart', $cart);

        return redirect()->route('store.cart');

    }

    private function getCart()
    {
        if(Session::has('cart')) {
            $cart = Session::get('cart');

        }else {
            $cart = $this->cart;

        }
        return $cart;
    }
}
