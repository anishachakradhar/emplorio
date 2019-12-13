<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applier;
use App\Interview_Schedule;
use App\Working_Timetable;
use Carbon\Carbon;
use DateTime;
use App\Events\ApprovalEvent;

class InterviewScheduleController extends Controller
{
    protected $dates = ['input_date'];
    public function scheduleForm($id)
    {
        $applier = Applier::find($id);
        return view('pages.interview.interviewScheduleForm',compact('applier'));
    }

    public function storeInterviewInfo(Request $request)
    {
        
        //Carbon::parse converts the variable into carbon datetime object
        $input_date = Carbon::parse($request->get('interview_date'));
        $in_time = Carbon::parse($request->get('interview_time'));

        //pluck() selects a specific column 
        $saved_times = Interview_Schedule::where('interview_date',$request->input('interview_date'))->get()->pluck('interview_time')->all();
        // alternative:
        // $saved_times = Interview_Schedule::select('interview_time')->where('interview_date',$request->input('interview_date'))->get()->all()->toArray();

        //converting input time into 24 hr format
        $input_time = (Carbon::parse($in_time))->Format('H:m:s');
        $starting_time = (Carbon::parse("10:00 am"))->format('H:m:s');
        $end_time = (Carbon::parse("5:00 pm"))->format('H:m:s');

        //converting date to day
        $day = $input_date->isoFormat('dddd');

        //checking if the duplicate record exists or not
        $exist = Interview_Schedule::where('interview_date',$request->input('interview_date'))
                                    ->where('interview_time',$request->input('interview_time'))
                                    ->first();

        if ($exist)
        {
            return redirect()->back()->with('error','Interview Date and Time already exists.Enter a new one.');
        }

        if ($day == 'Saturday')
        {
            return redirect()->back()->with('error','The date you entered is Saturday. Please enter a new date.');
        }
        //checking if the time lies in between 10 am and 5 pm
        if ($input_time <= $starting_time or $input_time >= $end_time)
        {
            return redirect()->back()->with('error','Interview time should be between 10:00 am to 5:00 pm ');
        }

        //checking for gap between the previous timimgsa and new one
        foreach ($saved_times as $each_time)
        {
            $diff = (Carbon::parse($each_time))->diffInMinutes($in_time);
            if ($diff <= 10)
            {
                return redirect()->back()->with('error','Not enough time for previous interview. please choose new one.');
            }
        }

        //saving new record
        $schedule = new Interview_Schedule([
            'applier_id' => $request->get('applier_id'),
            'interview_date' => $request->get('interview_date'),
            'interview_time'=>$request->get('interview_time'),
        ]);
        $schedule->save();

        $applier=$schedule->applier;
        event(new ApprovalEvent($applier,$schedule));
        return redirect('/show')->with('success','Interview Date set');                               
    }
    public function showInterviewInfo()
    {
        $schedules = Interview_Schedule::all();
        return view('pages.interview.interviewInfo', compact('schedules'));
    }
}
