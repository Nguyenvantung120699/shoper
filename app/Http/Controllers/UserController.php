<?php

namespace App\Http\Controllers;


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

use App\Models\User;

class UserController extends Controller
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

    public function index(){
        $user = User::all();
        return view('admin.users.index',['user'=>$user]);
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){
        $request->validate([
            "email"=> "required|string|max:255|unique:users",
            "name"=> "required|string",
            "password"=> "required|string",
            "roles" => "required|Integer"
        ]);
        try{
            User::create([
                "email"=> $request->get("email"),
                "name"=> $request->get("name"),
                "password"=> $request->get("password"),
                "roles"=> $request->get("roles"),
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/userIndex");
    }


    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit',['user'=>$user]);
    }
    public function update($id,Request $request){
        $user = User::find($id);
        $request->validate([
            "email"=> "required|string|email|max:255|unique:users,email,".$id,
            "name"=> "required|string|max:255,",
            "roles"=> "required|Integer",
        ]);
        try{
            $user->update([
                "email"=> $request->get("email"),
                "name"=> $request->get("name"),
                "roles"=> $request->get("roles")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/userIndex");
    }

    public function infoUpdate($id,Request $request){
        $user = User::find($id);
        $request->validate([
            "name"=> "required|string|max:255:users,name,".$id,
            "email"=> "required|string|email|max:255|unique:users,email,".$id,
            "password"=> "required|string|min:8:users,password,".$id,
            "role"=> "required|Integer:users,role,".$id,
        ]);
        try{
            $avatar = null;
            $ext_allow = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("avatar")){
                $file = $request->file("avatar");
                $file_name = time()."_".$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                if(in_array($ext,$ext_allow)){
                    $file->move("upload/users",$file_name);
                    $avatar = "upload/users".$file_name;
                }      
            }
            $user->update([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "avatar" => $avatar,
                "gender"=> $request->get("gender"),
                "address"=> $request->get("address"),
                "password" => $request->get("password"),
                "role"=> $request->get("role")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("adminView/users");
    }

    public function destroy($id){
        $user = User::find($id);
        try {
            $user->delete();

        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/userIndex");
    }

}
