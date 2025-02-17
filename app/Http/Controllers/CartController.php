<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id'=> 'required',
            'qty' =>'required'
        ]);
        $data['user_id'] = Auth::id();

        //check if the product is always in cart
        $cart = Cart::where('user_id', Auth::id())->where('product_id',$data['product_id'])->first();
        if($cart)
        {
            $cart->qty =$data['qty'];
            $cart->save();
            return back()->with('success', 'Cart Updated Successfully');
        }
        Cart::create($data);
        return back()->with('success', 'Product added to cart Successfully');


        // Cart::create($data);
        // return back()->with('success', 'product added to cart successfully');
        }

        public function mycart()
        {
            //user ko id le cart ko user_id sanga match garera cart haru tanna lai
            $carts = Cart::where('user_id', Auth::id())->get();
            //yedi discount price is empty
            foreach($carts as $cart)
            {
                if($cart->product->discounted_price == '')
                {
                    $cart->total = $cart->product->price * $cart->qty;
                }
                else
                {
                    //discounted price xa vane
                    $cart->total = $cart->product->discounted_price * $cart->qty;
                }
            }
            return view('mycart', compact('carts'));
        }

        public function destroy($id)
        {
            
            Cart::find($id)->delete();
            return back()->with('success', 'Product removed from cart successfully');
        }
}
