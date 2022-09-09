<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Department;
use Hash;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::orderBy('id','desc')->get();
        return view('admin.employees',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department=Department::orderBy('name','asc')->get();
        return view('admin.employee_create',compact('department'));
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
            'name'=>'required|min:3|max:191',
            'email'=>'required|email|unique:employees,email',
            'password'=>'required|min:8|confirmed',
            'department'=>'required|numeric|exists:departments,id',
        ]);
        Employee::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'department_id'=>$request->department
        ]);
        return back()->with(['message'=>'Done create a new employee']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $department=Department::orderBy('name','asc')->get();
        return view('admin.employee_edit')->with(['employee'=>$employee,'department'=>$department]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'=>'required|min:3|max:191',
            'email'=>'required|email|unique:employees,email,'.$employee->id,
            'password'=>'nullable|min:8|confirmed',
            'department'=>'required|numeric|exists:departments,id',
        ]);
        if($request->password !=null){
            $employee->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'department_id'=>$request->department
            ]);   
        }else{
            $employee->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'department_id'=>$request->department
            ]);
        }
        return back()->with(['message'=>'Done update a employee']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->Delete();
        return back()->with(['message'=>'done delete a employee']);
    }
}
