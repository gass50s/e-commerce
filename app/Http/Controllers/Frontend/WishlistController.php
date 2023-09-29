<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    //
    public function index()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));
    }


    public function addwishlist(Request $request){
        $product_id = $request->input('product_id');
      if(Auth::check()){
             $prod_check = Product::where('id',$product_id)->exists();
             if($prod_check){
                 if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->first()){
                          
                     return response()->json(['status'=> " Product Already Added to Wislist"]);

                 }

                 else{

                     $wish = neW Wishlist();
                     $wish->prod_id = $product_id;
                     $wish->user_id = Auth::id();
                     $wish ->save();
                      
                     return response()->json(['status'=>"  product Added To Wishlist"]);

                 }
             }
      }
      else{
         return response()->json(['status'=>"login to continue"]);
      }
 }




 public function destroyproduct(Request $request){
    if(Auth::check()){
        $prod_id = $request->input('prod_id');

        if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
            $wish = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
            $wish->delete();
            return response()->json(['status'=>"Product Delete  from Wishlist Seccesfuly"]);

        }

    }
    else{
       return response()->json(['status'=>"login to continue"]);
    }

}

public function wishlistcount
(){
    $wishlistcount = Wishlist::where('user_id',Auth::id())->count();
    return response()->json(['count'=> $wishlistcount]);
}
}
