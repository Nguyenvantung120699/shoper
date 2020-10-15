<?php

namespace App\Http\Controllers;

use App\Models\FeedbackProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "product_id"=> "integer",
            "point"=> "integer",
            "feel"=> "string",
            "image" => "string",
        ]);
        FeedbackProduct::create([
            "user_id" => Auth::id(),
            "name"=> Auth::user()->name,
            "product_id"=> $request->get("product_id"),
            "point"=> $request->get("point"),
            "feel"=> $request->get("feel"),
            "image"=> $request->get("image"),
        ]);
        // try{
        //     $image = null;
        //     $ext_allow = ["png","jpg","jpeg","gif","svg"];
        //     if($request->hasFile("image")){
        //         $file = $request->file("image");
        //         $file_name = time()."_".$file->getClientOriginalName();
        //         $ext = $file->getClientOriginalExtension();
        //         if(in_array($ext,$ext_allow)){
        //             $file->move("upload/feedbacks/",$file_name);
        //             $image = "upload/feedbacks/".$file_name;
        //         } 
        //     }
        //     FeedbackProduct::create([
        //         "user_id" => Auth::id(),
        //         "name"=> Auth::user()->name,
        //         "product_id"=> $request->get("product_id"),
        //         "point"=> $request->get("point"),
        //         "feel"=> $request->get("feel"),
        //         "image"=> $image,
        //     ]);
        // }catch(\Exception $e){
        //     return redirect()->back();
        // }
        return response()->json([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeedbackProduct  $feedbackProduct
     * @return \Illuminate\Http\Response
     */
    public function show(FeedbackProduct $feedbackProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeedbackProduct  $feedbackProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(FeedbackProduct $feedbackProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeedbackProduct  $feedbackProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeedbackProduct $feedbackProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeedbackProduct  $feedbackProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedbackProduct $feedbackProduct)
    {
        //
    }
}
