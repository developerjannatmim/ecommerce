<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use UserType;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{

    public function index(){
        $product = Product::paginate(6);
       return view('home.userpage',compact('product'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1'){
            return view('admin.home');
        }else{
            $product = Product::paginate(3);
            return view('home.userpage',compact('product'));
        }
    }

    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id()){
            $user = Auth::user();
            $product = Product::find($id);


            $cart = new cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;

            if($product->discount_price != null)
            {
                $cart->price = $product->discount_price * $request->quantity;
            }else{
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->Prduct_id = $product->id;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();

        }else{
            return redirect('login');
        }
    }

    public function show_cart(){

        if(Auth::id()){

        $id = Auth::user()->id;
        $cart = cart::where('user_id','=',$id)->get();
        return view('home.show_cart',compact('cart'));

        }else{
            return redirect('login');

    }
}

public function remove_cart($id){
    $cart = cart::find($id);
    $cart->delete();
    return redirect()->back()->with('message', 'Product deleted Successfully');
}


public function cash_order(){
    $user = Auth::user();
    $userid = $user->id;
    $data = cart::where('user_id','=',$userid)->get();
    dd($data);
}

}