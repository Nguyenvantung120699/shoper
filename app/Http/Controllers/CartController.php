<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;

use App\Mail\OrderCreated;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use App\Models\Models\FeedbackProducts;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shopping($id, Request $request){
        $product=Product::find($id);
        $cart = Cart::where("user_id",Auth::id())->get();
        $request->validate([
            "quantity"=> "required|integer",
            "color" =>"required|string",
            "size" =>"required|string",
        ]);
        foreach ($cart as $p){
            if($p->product_id == $product->id)
            {
                $p->quantity = $p->quantity+$request->get('quantity');
                $p->total = $p->total+$product->price*$request->get("quantity");
                $p->save();
                return redirect()->to("/cart");
            }
        }
        Cart::create([
            "user_id" => Auth::id(),
            "product_id" => $id,
            "color"=> $request->get("color"),
            "size" => $request->get("size"),
            "quantity" => $request->get("quantity"),
            "total" => $product->price*$request->get("quantity"),
        ]);
        return redirect()->to("/cart");
    }
    // public function updateCart(Request $request){
    //     $cart = Cart::where("user_id",Auth::id())->get();
    //     foreach($cart as $p){
    //         $request->validate([
    //             'quantity'=> 'required|integer',
    //         ]);
    //         foreach ($cart as $p){
    //             $p->quantity = $p->quantity+$request->get('quantity');
    //             $p->total = $p->total+$product->price*$request->get("quantity");
    //             $p->save();
    //             return redirect()->to("/cart");
    //         }
    //     }
    //     return redirect()->to("/cart");
    // }
    public function deleteItemCart($id){
        $cart = Cart::find($id);
        try {
            $cart->delete();

        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("/cart");
        }
    public function increaseOne($id,Request $request){
        if(!$cart=session()->has("cart")){
            return redirect()->to("/");
        }
        $cart =$request-> session()->get('cart');
        foreach ($cart as $p){
            if($p->id ==$id){
                $p->cart_qty+=1;
                return redirect()->to("/cart");
            }
        }
        return redirect()->to("/cart");
    }
    public function clearCart(){
        $id = Auth::id();
        $cart = Cart::where("user_id",$id)->get();
        try {
            foreach($cart as $c){
                $c->delete();
            }
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("/cart");
    }

    public function showCart(){    
        $cart = Cart::where("user_id",Auth::id())->get();
        return view("client.cart",["cart"=>$cart]);
    }



    public function CheckOut(Request $request){    
        $request->validate([
            "cart_id[]"=> "string",
        ]);
        $cart = $request->get("cart_id");
        if($cart != null){
            foreach($cart as $c){
                $carts = Cart::find($c);
                $item[] = $carts;
                $grand_total[] = $carts->total;
            }
            $total = array_sum($grand_total);
            return view("client.check_out",["item"=>$item,"total"=>$total]);
        }else{
            return redirect()->back();
        }
    }

}
