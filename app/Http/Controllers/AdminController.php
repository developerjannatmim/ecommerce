<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {

        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {

        $data = new category;
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $category = Category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->des_pro;
        $product->category = $request->category;
        $product->quantity = $request->quan_pro;
        $product->price = $request->pri_pro;
        $product->discount_price = $request->disc_pro;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');

    }


    public function show_product()
    {
        $product = Product::all();
        return view('admin.show-product',compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted Successfully');
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.update-product',compact('product','category'));
   }

   public function update_product_confirm(Request $request,$id)
   {
       $product = Product::find($id);
       $product->title = $request->title;
       $product->description = $request->des_pro;
       $product->category = $request->category;
       $product->quantity = $request->quan_pro;
       $product->price = $request->pri_pro;
       $product->discount_price = $request->disc_pro;

       $image = $request->image;
       if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image = $imagename;
       }

        $product->save();

        return redirect()->back()->with('message', 'Product updated Successfully');
   }
}