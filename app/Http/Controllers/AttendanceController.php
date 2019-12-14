<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use Session;
use App\Employee;
// use Excel;
use App\Attendance;

use Illuminate\Http\Request;
// use App\Imports\AttendanceImport;
// use Maatwebsite\Excel\Facades\Excel;

use App\Exports\AttendanceExport;
use App\Imports\AttendanceImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AttendanceRequest;
use Carbon\Carbon;

class AttendanceController extends Controller
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employee_id)
    {
        $employee = Employee::where('employee_id',$employee_id)->first();
        $attendances = Attendance::where('employee_id',$employee->employee_id)->get();
        return view('pages.frontend.pages.attendance.attendance-import',compact('employee','attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(AttendanceRequest $request)
    {
        try {
            $uploadedFile = $request->file('attendance_import');

            $path = (Storage::putFileAs('attendance_import', $uploadedFile, time().'-'.$request->employee_id.'.'.$uploadedFile->getClientOriginalExtension()));
            Excel::import(new AttendanceImport($request->employee_id), $path);

            return redirect()->route('employee.attendance', $request->employee_id)->with('success', 'Attendance has been imported');
        } catch (\Throwable $th) {
            return redirect()->route('employee.attendance', $request->employee_id)->with('error', $th->getMessage());
        }
        

        
        
}}
