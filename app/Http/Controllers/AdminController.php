<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function showLogin(){
        return view('admin.login');
    }

    function doLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validatedData = $validator->validated();

        $isAuthinticate = Auth::attempt($validatedData);

        if(!$isAuthinticate){
            return back()->withErrors('Credentials are incorrect');
        }

        $user = Auth::user();

        if(!$user->is_admin){
            return back()->withErrors('You are authorized to access this page');
        }


        return redirect(route('admin.dashboard'));
    }


    public function showDashboard(){
        return view('admin.index');
    }
}
