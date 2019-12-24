<?php

namespace App\Http\Controllers;

use App\Applier;
use App\Apply_Process;
use App\Posts_Open;
use App\Http\Requests\ApplyValidation;
use App\Mail\ApplyMail;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Webpatser\Uuid\Uuid;
use App\Notifications\NewApplierNotification;
class ApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','HrMiddleware'],['only' => ['dashboard', 'show','viewIndividual']]);
    }

    public function dashboard()
    {
        return view('pages.content');
    }

    public function index()
    {
        $posts = Apply_Process::all();
        $process = Posts_Open::all();
        return view('pages.applier.applyForm')->with(compact('posts','process'));
    }

    public function store(ApplyValidation $request)
    {
       
        $applier = new Applier([
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'contact_no'=>$request->get('contact_no'),
            'area_applied'=>$request->get('areaOfInterest'),
            'cover_letter'=>$request->get('coverLetter'),
            'expectation'=>$request->get('expectation'),
            'required_by_college'=>$request->get('internRequired'),
            'apply_by'=>$request->get('applyBy'),
            'earliest_date'=>$request->get('earliest_date'),

        ]);
        $applier->id=(Uuid::generate()->string);
         if ($file=$request->file('CV')){
             $name=$file->getClientOriginalName();
             $extension=$file->getClientOriginalExtension();
//             dd($extension);
             if($file->move('uploads',$name)){
                 $applier->CV = $name;
                //  dd($applier);
             }
          }

             $applier->save();

        Mail::to($applier->email)->send(new ApplyMail($applier));

        return redirect()->back()->with('success', 'Application sent successfully');
    }

    public function show()
    {
        $appliers = Applier::all();
        return view('pages.applier.viewDetails', compact('appliers'));
    }

    public function viewIndividual($id)
    {
        $singleApplier = Applier::findOrFail($id);
        return view('pages.applier.singleApplier', compact('singleApplier'));
    }

    public function approvedApplier()
    {
        $appliers = Applier::all();
        return view('pages.applier.approvedList', compact('appliers'));
        
    }

}