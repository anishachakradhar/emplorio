<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeSchedule;
use App\Http\Requests\EmployeeScheduleRequest;
use App\Employee;
use Illuminate\Support\Str;


class EmployeeScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $employee = Employee::where('employee_id',$id)->with('employeeSchedule:id,employee_id,day')->first();

        $hasScheduleDays = [];

        foreach($employee->employeeSchedule as $schedule){
            array_push($hasScheduleDays, $schedule->day);
        }

        $days = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
        ];

        $notOnSchedule = array_diff($days, $hasScheduleDays);
        return view('pages.frontend.pages.employee.employee-schedule',compact('employee','notOnSchedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeScheduleRequest $request)
    {
        $days = $request->days;
        foreach($days as $day){
            $schedule = EmployeeSchedule::create([
                'day' => $day,
                'starting_time' => $request->starting_time,
                'ending_time' => $request->ending_time,
                'schedule_id' => Str::random(5),
                'employee_id' => $request->employee_id,
            ]);
        }

        if(empty($schedule)){
            return redirect()->route('employee.schedule',$schedule->employee->employee_id)->with('error','Error in creating employee schedule');
        }

        return redirect()->route('employee.schedule',$schedule->employee->employee_id)->with('success','Successfully created employee schedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where('employee_id',$id)->first();
        $schedules = EmployeeSchedule::where('employee_id',$employee->employee_id)->get();
        return view('pages.frontend.pages.employee.employee-schedule-list',compact('employee','schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = EmployeeSchedule::where('schedule_id',$id)->first();
        $employee = Employee::where('employee_id',$schedule->employee_id)->first();
        return view('pages.frontend.pages.employee.employee-schedule',compact('schedule','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $schedule = EmployeeSchedule::where('schedule_id',$id)->first();
            $schedule->update([
                'day' => $request->day,
                'starting_time' => $request->starting_time,
                'ending_time' => $request->ending_time,
            ]);

            return redirect()->route('employee.schedule.show',$schedule->employee_id)->with('success','Successfully updated a schedule');
        }catch(\Throwable $th)
        {
            return redirect()->route('employee.schedule.show',$schedule->employee_id)->with('error','Error in  updating a schedule');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function softdelete($id)
    {
        $schedule = EmployeeSchedule::where('schedule_id',$id)->first();
        $employee = Employee::where('employee_id',$schedule->employee_id)->first();
        $schedule->delete();
        return redirect()->route('employee.schedule.show',$employee->employee_id)->with('success','Successfully deleted a schedule');
    }
}
