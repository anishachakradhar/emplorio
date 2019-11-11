<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeType;
use App\EmployeeDepartment;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('pages.frontend.pages.employee.employee-list')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = EmployeeType::all();
        $departments = EmployeeDepartment::all();
        return view('pages.frontend.pages.employee.employee',compact('types','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create([
            'name' => $request->name,
            'employee_id' => Str::random(5),
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $request->dob,
            'employee_type_id' => $request->employee_type_id,
            'department_id' => $request->department_id,
        ]);

        if(empty($employee)){
            return redirect()->route('employee')->with('error','Error in creating an employee');
        }

        return redirect()->route('employee')->with('success','Successfully created an employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('employee_id',$id)->first();
        $types = EmployeeType::all();
        $departments = EmployeeDepartment::all();
        return view('pages.frontend.pages.employee.employee',compact('employee','types','departments'));
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
            $employee = Employee::where('employee_id',$id)->first();
            $employee->update([
                'name' => $request->name,
                'email'=> $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'dob' => $request->dob,
                'employee_type_id' => $request->employee_type_id,
                'department_id' => $request->department_id,
            ]);

            return redirect()->route('employee.list')->with('success','Employee details updated successfully');
        }catch(\Throwable $th){
            return redirect()->route('employee.list')->with('error','Error in updating details');
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
        $employee = Employee::where('employee_id',$id)->first();
        $employee->delete();
        return redirect()->route('employee.list')->with('success','Successfully deleted an employee details');
    }
}
