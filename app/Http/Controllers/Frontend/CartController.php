<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Product;
use App\Models\Cart;
use Ramsey\Uuid\Rfc4122\UuidBuilder;

class CartController extends Controller
{
    //
    public function addProduct(Request $request){
           $product_id = $request->input('product_id');
           $product_qty = $request->input('product_qty');
         if(Auth::check()){
                $prod_check = Product::where('id',$product_id)->exists();
                if($prod_check){
                    if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first()){
                             
                        return response()->json(['status'=> " Product Already Added to Cart"]);
 
                    }

                    else{

                        $cartitem = neW Cart();
                        $cartitem->prod_id = $product_id;
                        $cartitem->user_id = Auth::id();
                        $cartitem->prod_qty = $product_qty;
                        $cartitem ->save();
                         
                        return response()->json(['status'=>"Product Added To Carte Seccesfuly"]);
 
                    }
                }
         }
         else{
            return response()->json(['status'=>"login to continue"]);
         }
    }

    public function viewcart(){
        $cartitem = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartitem'));

    }

    public function destroyproduct(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('prod_id');

            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cartitem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status'=>"product delete seccesfuly"]);

            }

        }
        else{
           return response()->json(['status'=>"login to continue"]);
        }

    }

    public function updateCart(Request $request){
        $prod_id = $request->input('prod_id');
           $prod_qty = $request->input('prod_qty');

           if(Auth::check()){
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cart =Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty= $prod_qty;
                $cart->update();
                return response()->json(['status'=>"Quantity update seccesfuly"]);

            }

           }
           else{
            return response()->json(['status'=>"login to continue"]);
         }
    }

    public function cartcount(){
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=> $cartcount]);
    }
}
