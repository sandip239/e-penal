<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class admincontroller extends Controller
{
    public function index(request $request)
    {
        if ($request->ajax()) {
            $users = Admin::select(['id', 'name', 'email','country','gender']);
            return DataTables::of($users)->toJson();
        }
        return view('dashboard');
    }

    public function userRegister()
    {
        return view('user-register');
    }

    public function userData(request $request)
    {
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'gender' => $request->gender,
            'city' =>$request->city,
            'state' =>$request->state,
            'languages' => implode(',', $request->languages),
        ]);
        $message = 'Admin record created successfully';
        return response()->json(['message' => $message]);
    }


    public function editUser($id)
    {

         $user = Admin::find($id);
         return response()->json(['status'=>200,'user'=>$user]);
    }

    public function updateUser(request $request)
    {

         dd($request);
    }
}
