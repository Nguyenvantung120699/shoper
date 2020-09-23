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

class OrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function __invoke(Request $request)
    // {
    //     //
    // }

    public function Create(Request $request){
        $request->validate([
            'customer_name'=> 'required | string',
            'shipping_address' => 'required',
            'payment_method'=> 'required',
            'grand_total'=> 'required',
            'telephone'=> 'required',
            'customer_note'=> 'required',
            'cart_id[]'=> 'string',
        ]);
        $order = Order::create([
            'user_id'=>Auth::id(),
            'customer_name'=> $request->get("customer_name"),
            'shipping_address'=> $request->get("shipping_address"),
            'telephone'=> $request->get("telephone"),
            'grand_total'=>$request->get("grand_total"),
            'payment_method'=> $request->get("payment_method"),
            'customer_note'=> $request->get("customer_note"),
            "status"=> Order::STATUS_PENDING
        ]);
        $cart_id = $request->get("cart_id");
        foreach($cart_id as $id){
            $cart = Cart::find($id);

            $product = Product::where("id",$cart->product_id)->first();
            $product->update([
                "quantity" => $product->quantity-$cart->quantity,
                "purchase" => $product->purchases+$cart->quantity,
            ]);
            DB::table("order_product")->insert([
                'order_id'=> $order->id,
                'product_id'=>$cart->product_id,
                'color'=>$cart->color,
                'size'=>$cart->size,
                'quantity'=>$cart->quantity,
                'price'=>$product->price
            ]);
            $cart->delete();
        }
        return redirect()->to("/confirm-order");
    }

    public function confirmOrder(){
        return view("client.confirm_order");
    }

    public function showOrder(){
        $order = Order::where("user_id",Auth::id())->get();
        return view("client.list_order",['order'=>$order]);
    }
}
