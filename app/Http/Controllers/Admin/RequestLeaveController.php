<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
class RequestLeaveController extends Controller
{
    /**
     * Method View All Leaves
     * @return View admin/leaves
     */
    public function index()
    {
        $leaves=Leave::orderBy('id','desc')->get();
        return view('admin.leaves',compact('leaves'));
    }
    /**
     * Method Accept Leave
     * change status to accept where id equles $id
     * @param Leave $id
     * @return Back page with success message
     */
    public function AcceptLeave(Leave $id)
    {
        $id->update(['status'=>'Accept']);
        return back()->with(['message'=>'Done Accepted Leave']);
    }
    /**
     * Method rejected Leave
     * change status to rejected where id equles $id
     * @param Leave $id
     * @return Back page with success message
     */
    public function RejectedLeave(Leave $id)
    {
        $id->update(['status'=>'Rejected']);
        return back()->with(['message'=>'Done Rejected Leave']);
    }
}
