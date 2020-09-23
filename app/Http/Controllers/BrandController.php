<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            "brands_name"=> "required|string|unique:brand",
            "history" =>"string",
            "is_active" =>"required|Integer",
        ]);
        try{
            $logo = null;
            $ext_allow = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("logo")){
                $file = $request->file("logo");
                $file_name = time()."_".$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                if(in_array($ext,$ext_allow)){
                    $file->move("upload/brand/",$file_name);
                    $logo = "upload/brand/".$file_name;
                } 
            }
            Brand::create([
                "brands_name" => $request->get("brands_name"),
                "logo" => $logo,
                "history"=> $request->get("history"),
                "is_active" => $request->get("is_active"),
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brandIndex");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.detail',['brands'=>$brands]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit',['brands'=>$brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "brands_name"=> "required|string|unique:brand,brands_name,".$id,
            "history" =>"string",
            "is_active" =>"required|Integer",
        ]);
        $brand = Brand::find($id);
        $brand->brands_name = $request->get('brands_name');
        try {
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $name = time()."_".$logo->getClientOriginalName();
                $name = $name . "." . $logo->getClientOriginalExtension();
                $logo->move("upload/brand/",$name);

                $brands->logo = "upload/brand/".$name;
            }
        $brand->history = $request->get('history');
        $brand->is_active = $request->get('is_active');
        $brand->save();
        } catch (\Exception $e) {
            throw $e;
        }
        return redirect()->to("admin/brandIndex");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brands = Brand::find($id);
        try {
            $brands->delete();

        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brandIndex");
    }
}
