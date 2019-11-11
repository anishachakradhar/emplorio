@extends('pages.frontend.layouts.master')

@section('content')
        <div class="row" style="margin: 10%;">
            <div class="col-3"></div>
            <div class="col-6">
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
                    Select an employee department
                    </div>
                    <div class="card-body">
                        @if(isset($employee_department))
                            <form action="{{route('employee.department.update',$employee_department->department_id)}}" method="POST">
                            @method('PATCH')
                        @else
                            <form action="{{route('employee.department.store')}}" method="POST">
                        @endif
                            @csrf
                            <div class="form-item">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Employee Department Name</label>
                                    <div class="col-sm-6">

                                        <input class="form-control" name="department_name" placeholder="Employee department name" value="{{isset($employee_department)? $employee_department->department_name: ''}}">
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
            <div class="col-3"></div>
        </div>
@endsection