@extends('pages.frontend.layouts.master')

@section('content')
        <div class="row" style="margin: 5%;">
            <div class="col-2"></div>
            <div class="col-8">
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}

                        {{-- {{session('error')}} --}}
                    </div>
                @elseif(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card text-center">
                    <div class="card-header">
                    Select an employee type
                    </div>
                    <div class="card-body">
                        @if(isset($employee))
                            <form action="{{route('employee.update',$employee->employee_id)}}" method="POST">
                                @method('PATCH')
                        @else
                            <form action="{{route('employee.store')}}" method="POST">
                        @endif
                            @csrf
                            <div class="form-item text-right">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Employee Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="name" placeholder="Employee name" value="{{isset($employee)? $employee->name: ''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Email ID</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="email" placeholder="Email ID" value="{{isset($employee)? $employee->email: ''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Phone number</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="phone" placeholder="Phone number" value="{{isset($employee)? $employee->phone: ''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Address</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="address" placeholder="Address" value="{{isset($employee)? $employee->address: ''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date of birth</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" name="dob" placeholder="Date of birth" value="{{isset($employee)? $employee->dob: ''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Employee Type Name</label>
                                    <div class="col-sm-6">
                                        <select class="custom-select" name="employee_type_id">
                                            @if(isset($employee))
                                                <option value="{{$employee->employeeType->employee_type_id}}">{{$employee->employeeType->employee_type_name}}</option>
                                            @else
                                                <option selected>Open this select menu</option>
                                            @endif
                                            @foreach($types as $type)
                                                <option value="{{$type->employee_type_id}}">{{$type->employee_type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Employee Department Name</label>
                                    <div class="col-sm-6">
                                        <select class="custom-select" name="department_id">
                                            @if(isset($employee))
                                                <option value="{{$employee->department->department_id}}">{{$employee->department->department_name}}</option>
                                            @else
                                                <option selected>Open this select menu</option>
                                            @endif
                                            @foreach($departments as $department)
                                                <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                    Thanks !
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
@endsection