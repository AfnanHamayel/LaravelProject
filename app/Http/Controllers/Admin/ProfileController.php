<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile');
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admin=Auth::user();
        $request->validate([
            'name'=>'required|min:3|max:191',
            'email'=>'required|email|unique:admins,email,'.$admin->id,
            'password'=>'nullable|min:8|confirmed',
        ]);

        if($request->password !=null){
            $admin->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);   
        }else{
            $admin->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
        }
        return back()->with(['message'=>'Done update your profile']);
    
    }

    
}
