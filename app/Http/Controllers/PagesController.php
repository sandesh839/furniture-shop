<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::where('status','Show')->latest()->limit(6)->get();
        return view('welcome', compact('products'));
    }

    public function viewproduct($id)
    {
        $product = Product::where('status','Show')->find($id);
        $relatedproducts = Product::where('category_id',$product->category_id)->where('id','!=',$id)->limit(4)->get();
        return view('viewproduct', compact('product','relatedproducts'));
    }

    public function categoryproduct($id)
    {
        $category = Category::find($id);
        $products = Product::where('status','Show')->where('category_id',$id)->get();
        return view('categoryproduct', compact('products','category'));
    }
    public function checkout($cartid)
    {
        $cart = Cart::find($cartid);
        if($cart->product->discounted_price == '')
        {
            $cart->total = $cart->product->price * $cart->qty;
        }
        else
        {
            $cart->total = $cart->product->discounted_price * $cart->qty;
        }
        return view('checkout', compact('cart'));
    }

    public function search(Request $request)
    {
        $qry = $request->search;
        $products = Product::where('name','like','%'.$qry.'%')->orWhere('description','like','%'.$qry.'%')->get();
        return view('search',compact('products'));
    }

}