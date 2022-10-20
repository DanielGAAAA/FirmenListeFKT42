<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin;
use App\Http\Resources\Admin as AdminResource;
class AdminController extends Controller
{
    public function index(){

        $firmen = Admin::paginate(15);
        return AdminResource::collection($firmen);
    }

    public function show(){

    }

    public function add(Request $request){
    $admin= new Admin;

    $admin->vorname=$request->input("vorname");
    $admin->nachname=$request->input("nachname");
    $admin->email=$request->input("email");
    $admin->password=$request->input("password");

    $admin->password=bcrypt($admin->password);
   if($admin->save()){
    return new AdminResource($admin);
   }


    }
}
