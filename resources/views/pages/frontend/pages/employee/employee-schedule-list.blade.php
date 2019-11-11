@extends('pages.frontend.layouts.master')

@section('content')
<div class="row" style="margin: 10%;">
    <div class="col-2"></div>
    <div class="col-8">
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @elseif(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <div class="card">
            <div class="card-header text-center">
                Schedule
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Day</th>
                        <th scope="col">Starting Time</th>
                        <th scope="col">Ending Time</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th><a class="btn btn-success" href="{{route('employee.schedule',$employee->employee_id)}}">Add Schedule</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($employee))
                            @foreach($schedules as $schedule)
                                <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$schedule->day}}</td>
                                <td>{{$schedule->starting_time}}</td>
                                <td>{{$schedule->ending_time}}</td>
                                <td><a class="btn btn-success" href="{{route('employee.schedule.edit', $schedule->schedule_id)}}" aria-label="Edit"><i class="fa fa-pencil-square-o"></i></a></td>
                                <td>
                                    <form action="{{route('employee.schedule.delete',$schedule->schedule_id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" aria-label="Delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
@endsection