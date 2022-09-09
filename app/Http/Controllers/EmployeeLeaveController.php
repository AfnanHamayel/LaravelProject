<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\LeaveType;
class EmployeeLeaveController extends Controller
{
    public function index()
    {
        $leaves=Auth::User()->Leaves()->orderBy('id','desc')->get();
        return view('emp_leave',compact('leaves'));
    }
    public function create()
    {
        $types=LeaveType::orderBy('name','asc')->get();
        return view('emp_leave_create',compact('types'));
    }
    public function store(Request $request)
    {
        /**
         * Check Data is a validate Befor Create 
         * Return Message error to blade and veiw errors
         * */ 

        $request->validate([
            'description'=>'required|min:3|max:191',
            'type_leave'=>'required|exists:leave_types,id',
            'date'=>'required|date',
        ]);
        // Create New Leave From Relationship Employee and Leaves 
        $leaves=Auth::User()->Leaves()->create([
            'description'=>$request->description,
            'leave_type_id'=>$request->type_leave,
            'date'=>Carbon::parse($request->date)->toDateString(),
        ]);

        return back()->with(['success'=>"Done add new leave"]);
        
    }
}
