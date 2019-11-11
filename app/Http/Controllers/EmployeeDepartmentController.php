<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeDepartment;
use App\Http\Requests\EmployeeDepartmentRequest;
use Illuminate\Support\Str;


class EmployeeDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = EmployeeDepartment::all();

        return view('pages.frontend.pages.employee.employee-department-list')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.frontend.pages.employee.employee-department');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeDepartmentRequest $request)
    {
        $employee_department = EmployeeDepartment::create([
            'department_name' => $request->department_name,
            'department_id' => Str::random(5),
        ]);

        if(empty($employee_department)){
            return redirect()->route('employee.department')->with('error','Error in creating employee department');
        }

        return redirect()->route('employee.department')->with('success','Successfully created employee department');
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
        $employee_department = EmployeeDepartment::where('department_id',$id)->first();
        return view('pages.frontend.pages.employee.employee-department')->with('employee_department',$employee_department);
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
            $employee_department = EmployeeDepartment::where('department_id',$id)->first();
            $employee_department->update([
                'department_name' => $request->department_name,
            ]);

            return redirect()->route('employee.department.list')->with('success','Employee department name has been updated');
        }
        catch(\Throwable $th)
        {
            return redirect()->route('employee.department.list')->with('error','Error in updating department name');
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
        $employee_department = EmployeeDepartment::where('department_id',$id);
        $employee_department->delete();
        return redirect()->route('employee.department.list')->with('success','Employee department is deleted successfully');
    }
}
