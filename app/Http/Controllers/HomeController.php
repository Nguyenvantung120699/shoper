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

class HomeController extends Controller
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
    public function index()
    {
        $category = Category::orderBy('created_at','desc')->take(6)->get();
        $brand = Brand::orderBy('created_at','desc')->take(4)->get();
        $product = Product::orderBy('purchases','desc')->take(8)->get();
        $product_purchases = Product::orderBy('purchases','desc')->take(3)->get();
        $product_price = Product::orderBy('price','desc')->take(3)->get();
        $product_new = Product::orderBy('created_at','desc')->take(3)->get();
        $brand_news = Brand::orderBy('created_at','desc')->first();
        return view('client.index_home',['category'=>$category,'brand'=>$brand,
        'product_purchases'=>$product_purchases,
        'product_price'=>$product_price,
        'product_new'=>$product_new,
        'brand_news'=>$brand_news,'product'=>$product]);
    }

    public function shop()
    {
        $brand = Brand::all();
        $category = Category::all();
        $product = Product::where('quantity', '>', 1)->paginate(12);
        return view('client.shop',['brand'=>$brand,'category'=>$category,'product'=>$product]);
    }

    public function product_single($id)
    {
        $product=Product::find($id);
        $brand = Brand::find($product->brands_id);
        // $rate=FeedbackProducts::where("productsId",$product->id)->get();
        // $ratenew=FeedbackProducts::where("productsId",$product->id)->paginate(3);
        $img =explode(",",$product->gallery);
        $category_product =Product::where("category_id",$product->category_id)->where('id',"!=",$product->id)->take(4)->get();
        $brand_product =Product::where("brand_id",$product->brand_id)->where('id',"!=",$product->id)->take(4)->get();
        return view('client.product_detail',['product'=>$product,'category_product'=>$category_product,
        'brand_product'=>$brand_product,'brand'=>$brand,'img'=>$img]);
    }
}
