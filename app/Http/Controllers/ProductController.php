<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "product_name"=> "required|string",
            "product_description" => "string",
            "brand_id" =>"required|integer",
            "category_id" =>"required|integer",
            "color" =>"required|string",
            "size" =>"required|string",
            "classify" =>"required|string",
            "price" =>"required|numeric",
            "quantity" =>"required|integer",
            "is_active" =>"required|Integer"
        ]);
        try {
            $thumbnail = null;
            $ext_allow = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("thumbnail")){
                $file = $request->file("thumbnail");
                $file_name = time()."_".$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                if(in_array($ext,$ext_allow)){
                    $file->move("upload/products/",$file_name);
                    $thumbnail = "upload/products/".$file_name;
                }      
            }

            $gallery = null;
            $ext_allow = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile('gallery')){
                foreach ($request->file('gallery') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move("upload/products/", $name);
                    $data = "upload/products/".$name;
                    $image[] = $data;
                }
                $gallery = $image;
              }
            Product::create([
                "product_name" => $request->get("product_name"),
                "product_description" => $request->get("product_description"),
                'thumbnail' => $thumbnail,
                'gallery' => implode(",", $gallery),
                "brand_id" => $request->get("brand_id"),
                "category_id" => $request->get("category_id"),
                "color" => $request->get("color"),
                "size" => $request->get("size"),
                "classify" => $request->get("classify"),
                "price" => $request->get("price"),
                "quantity" => $request->get("quantity"),
                "is_active" => $request->get("is_active")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/productIndex");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.detail',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return view("admin.product.edit",['products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $request->validate([
            "product_name"=> "required|string:products".$id,
            "product_description" => "string",
            "brand_id" =>"required|Integer",
            "category_id" =>"required|integer",
            "color" =>"required|string",
            "size" =>"required|string",
            "classify" =>"required|string",
            "price" =>"required|numeric",
            "quantity" =>"required|Integer",
            "is_active" =>"required|Integer"
        ]);
        $products = Product::find($id);
        $products->product_name = $request->get('product_name');
        $products->product_description = $request->get('product_description');
        try {
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $name = time()."_".$thumbnail->getClientOriginalName();
                $name = $name . "." . $thumbnail->getClientOriginalExtension();
                $thumbnail->move("upload/products/",$name);

                $products->thumbnail = "upload/products/".$name;
            }
            if ($request->hasFile('gallery')) {
               foreach ($request->file('gallery') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move("upload/products/", $name);
                    $data = "upload/products/".$name;
                    $image[] = $data;
                }
                $gallery = $image;
                $product->gallery = implode(",", $gallery);
            }
        $products->brand_id = $request->get('brand_id');
        $products->category_id = $request->get('category_id');
        $products->color = $request->get('color');
        $products->size = $request->get('size');
        $products->classify = $request->get('classify');
        $products->price = $request->get('price');
        $products->quantity = $request->get('quantity');
        $products->is_active = $request->get('is_active');
        $products->save();
        } catch (\Exception $e) {
            throw $e;
        }
        return redirect()->to("admin/productIndex");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        try {
            $product->delete();

        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/productIndex");
    }
}
