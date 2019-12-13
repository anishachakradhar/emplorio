<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applier;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplyMail;
use App\Events\ApprovalEvent;

class ResultController extends Controller
{
    public function approve(Request $request,Applier $id)
    {
        $applier= Applier::find($id)->first();
        if($applier == NULL){
            return redirect()->back()->with('error', 'Cannot update status');
        }

        $update_status= $applier->update([
            'status' => 'Approved',
        ]);
        
        // event(new ApprovalEvent($applier));
         return redirect()->route('scheduleForm',[$applier])->with('success', 'Status changed.');
       
        if(!$applier){
            return redirect()->back()->with('error', 'Cannot update status');
        }
    }

    public function reject(Request $request,Applier $id)
    {
        $applier= Applier::find($id)->first();
        if($applier == NULL){
            return redirect()->back()->with('error', 'Cannot update status');
        }

        $update_status= $applier->update([
            'status' => 'Rejected',
        ]);
        event(new ApprovalEvent($applier,$update_status));
        return redirect()->back()->with('success', 'Status changed.');
       
        if(!$applier){
            return redirect()->back()->with('error', 'Cannot update status');
        }
    }

}
