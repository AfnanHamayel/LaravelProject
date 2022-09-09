<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function index()
    {
        return view('auth.admin_login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::guard('admin')->user();
            
            \Session::put('success','You are Login successfully!!');
            return redirect()->route('admin.dashboard');
            
        } else {
            return back()->with('error','your email and password are wrong.');
        }
    }
}
