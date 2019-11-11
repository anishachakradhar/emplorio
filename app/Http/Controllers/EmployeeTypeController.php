<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeType;
use App\Http\Requests\EmployeeTypeRequest;
use Illuminate\Support\Str;

class EmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = EmployeeType::all();
        // dd($items);
        return view('pages.frontend.pages.employee.employee-type-list')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('pages.frontend.pages.employee.employee-type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(EmployeeTypeRequest $request)
    {
        $employee_type = EmployeeType::create([
            'employee_type_name' => $request->employee_type_name,
            'employee_type_id' => Str::random(5),
        ]);

        if(empty($employee_type)){
            return redirect()->route('employee.type')->with('error', 'Error in creating Employee type');
        }
        return redirect()->route('employee.type')->with('success', 'Employee Type has been created');
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
        $employee_type = EmployeeType::where('employee_type_id', $id)->first();
        return view('pages.frontend.pages.employee.employee-type')->with('employee_type',$employee_type);
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
            $employee_type = EmployeeType::where('employee_type_id', $id)->first();

            $employee_type->update([
                'employee_type_name'=> $request->employee_type_name
            ]);

            return redirect()->route('employee.type.list')->with('success','Employee type updated');
        }catch(\Throwable $th){
            return redirect()->route('employee.type.list')->with('error','Error in updating');
        }

        // $employee_type = EmployeeType::where('employee_type_id', $id)->first();

    //     if($employee_type == NULL){
    //         return redirect()->route('employee.type.list')->with('error','Error in updating');
    //     }

    //     $employee_type->update([
    //         'employee_type_name'=> $request->employee_type_name
    //     ]);

    // return redirect()->route('employee.type.list')->with('success','Employee type updated');

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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'employee_type_name' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function softdelete($id)
    {
        $employee_type = EmployeeType::where('employee_type_id',$id);
        $employee_type->delete();
        return redirect()->route('employee.type.list');
    }
}
