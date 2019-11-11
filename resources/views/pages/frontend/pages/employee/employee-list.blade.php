@extends('pages.frontend.layouts.master')

@section('content')
<div class="row" style="margin: 10%;">
    <div class="col-12">
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @elseif(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">S.N</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">Address</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Employee Type</th>
                <th scope="col">Department</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">See schedule</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->address}}</td>
                    <td>{{$employee->dob}}</td>
                    <td>{{$employee->employeeType->employee_type_name}}</td>
                    <td>{{$employee->department->department_name}}</td>
                    <td><a class="btn btn-success" href="{{route('employee.edit', $employee->employee_id)}}" aria-label="Edit"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td>
                        <form action="{{route('employee.delete',$employee->employee_id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" aria-label="Delete">
                            <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </td>
                    <td><a class="btn btn-primary" href="{{route('employee.schedule.show',$employee->employee_id)}}" aria-label="Edit">View</i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection