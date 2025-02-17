<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::orderBy('priority')->get();
    return view('category.index',compact('categories'));
}

public function create()
{
    return view('category.create');
}
public function store(Request $request)
{
    // dd($request->all());
    $data = $request->validate([
        'priority' => 'required',
        'name' =>'required',
    ]);
    Category::create($data);
    // dd('Category created successfully');
return redirect()->route('category.index')
->with('success', 'Category Created Successfully');



}
public function edit($id)
{
    $category = Category::find($id);
    // dd($categories)//banako data sab dekhai dinxa 
    return view('category.edit',compact('category'));
}
public function update(Request $request, $id)
{
// dd($request->all());
$data =$request->validate([
    'priority' => 'required|numeric',
    'name' => 'required',
]);
$category = Category::find($id);
$category->update($data);
return redirect()->route('category.index')
->with('success', 'Category updated successsfully');
}

public function destroy(Request $request)
{
    // yadi product vitra vako saman category ma xa vane tyo delete hunna
    $category = Category::find($request->dataid);
            $products = Product::where('category_id',$request->dataid)->count();
            if($products>0){
                return redirect()->route('category.index')->with('success','Category Cannot be deleted, It has products');
            }
            $category->delete();
            return redirect()->route('category.index')->with('success','Category Deleted Successfully');

}

}