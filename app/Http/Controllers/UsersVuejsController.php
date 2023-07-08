<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentVuejs;
use App\Models\StatusVuejs;
use App\Models\UsersVuejs;
use Illuminate\Support\Facades\DB;

class UsersVuejsController extends Controller
{
    public function login($email, $password){

    }

    public function show($id){

        return UsersVuejs::findOrFail($id);
    }
    public function index(){
        $user = UsersVuejs::
        join('users_vuejs_departments','users_vuejs.department_id' , '=', 'users_vuejs_departments.id')
        ->join('users_vuejs_status', 'users_vuejs.status_id' , '=', 'users_vuejs_status.id')
        ->select(
                'users_vuejs.*',
                'users_vuejs_departments.name as departments',
                'users_vuejs_status.name as status'
            )
        ->get();
        return response()->json($user);
    }

    public function create(){
        $departments = DB::table("users_vuejs_departments")
            ->select(
                "id as value",
                "name as label"
            )
            ->get();
        $all_status = DB::table("users_vuejs_status")->select(
            "id as value",
            "name as label"
        )
        ->get();
      
        return response()->json([
            'users_status' => $all_status,
            'department' => $departments
        ]);       
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'status_id' => 'required',
            'username'=>'required|unique:users_vuejs,username',
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users_vuejs,email',
            'password'=>'required|confirmed',            
            'department_id'=>'required',
        ],[
            'status_id.required' => 'Cannot be empty (Không được để trống!)',
            'username.unique' =>'User name exists please check your username!',
        ]);
        //cach 1
       if($validated){
        $user= $request->except(["password","password_confirmation"]);
        $user["password"] = \Hash::make($request["password"]);
        UsersVuejs::create($user);
       }
        //cach 2
        // UsersVuejs::create([
        //     "status_id" => $request["status_id"],
        //     "username" => $request["username"],
        //     "name" => $request["name"],
        //     "email" => $request["email"],
        //     "department_id" => $request["department_id"],
        //     "password"=> \Hash::make($request["password"])
        // ]);        
    }
    public function edit($id){

        $departments = DB::table("users_vuejs_departments")
            ->select(
                "id as value",
                "name as label"
            )->get();
        $all_status = DB::table("users_vuejs_status")->select(
            "id as value",
            "name as label"
        )->get();      

        $user = UsersVuejs::find($id);
        return response()->json([
            "user" => $user,
            'users_status' => $all_status,
            'department' => $departments
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            
            'status_id' => 'required',
            'username'=>'required|unique:users_vuejs,username,'.$id,
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users_vuejs,email,'.$id,             
            'department_id'=>'required',
        ],[
            'status_id.required' => 'Cannot be empty (Không được để trống!)',
            'username.unique' =>'User name exists please check your username!',
        ]);
        UsersVuejs::find($id)->update([
            "status_id" => $request["status_id"],
            "username" => $request["username"],
            "name" => $request["name"],
            "email" => $request["email"],
            "department_id" => $request["department_id"],
        ]);
        if($request['chage_password']){
            $validated = $request->validate([           
                'password'=>'required|confirmed'         
            ]);
            UsersVuejs::find($id)->update([
                "password"=> \Hash::make($request["password"]),
                "change_password_at" => now()
            ]);
        }
    }
    
}
