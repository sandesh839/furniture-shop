<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', data: compact('products'));

    }
    

    // public function onSale()
    // {
    //     $products = Product::whereNotNull('discounted_price')->get();
    //     return view('products.onsale', compact('products'));
    // }

    // // Display all products
    // public function allProducts()
    // {
    //     $products = Product::all();
    //     return view('products.all', compact('products'));
    // }

    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        return view('product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'required|numeric|lt:price',
            'stock' => 'required',
            'status' => 'required',
            'photopath' => 'required|image',
        ]);
        
        //store picture
        $photo = $request->file('photopath');
        $photoname= time() . '.' . $photo->extension();
        $photo->move(public_path('images/products'), $photoname);
        $data['photopath'] = $photoname;

        Product::create($data);
        return redirect(route('product.index'))->with('success', 'Product Created Successfully');

    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories= Category::orderBy('priority')->get();
        return view('product.edit', compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'required|numeric|lt:price',
            'stock' => 'required',
            'status' => 'required',
            'photopath' => 'nullable|image',
        ]);

        $product = Product::find($id);
        $data['photopath'] = $product->photopath;
        if($request->hasFile('photopath'))
        {
            //store picture
        $photo = $request->file('photopath');
        $photoname= time() . '.' . $photo->extension();
        $photo->move(public_path('images/products'), $photoname);
        $data['photopath'] = $photoname;

        //delete old photo
        $oldphoto = public_path('images/prodducts/'.$product->photopath);
        if(file_exists($oldphoto))
        {
            unlink($oldphoto);
        }

        }

        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $photo = public_path('images/products/'.$product->photopath);
        if(file_exists($photo))
        {
            unlink($photo);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success','Product Deleted Successfully');
    }

   

}
