<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            "categories_name"=> "required|string|unique:category",
            "description" =>"string",
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
                    $file->move("upload/categories/",$file_name);
                    $logo = "upload/categories/".$file_name;
                } 
            }      
            Category::create([
                "categories_name"=> $request->get("categories_name"),
                "logo"=> $logo,
                "description"=> $request->get("description"),
                "is_active"=> $request->get("is_active")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/categoriesIndex");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);
        return view('admin.category.detail',['categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view("admin.category.edit",['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "categories_name"=> "required|string|unique:category,categories_name,".$id,
            "description" =>"string",
            "is_active" =>"required|Integer",
        ]);
        $categories = Category::find($id);
        $categories->categories_name = $request->get('categories_name');
        try {
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $name = time()."_".$logo->getClientOriginalName();
                $name = $name . "." . $logo->getClientOriginalExtension();
                $logo->move("upload/categories/",$name);

                $categories->logo = "upload/categories/".$name;
            }
        $categories->description = $request->get('description');
        $categories->is_active = $request->get('is_active');
        $categories->save();
        } catch (\Exception $e) {
            throw $e;
        }
        return redirect()->to("admin/categoriesIndex");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        try {
            $categories->delete();
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/categoriesIndex");
    }
}
