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
                    Create an employee schedule
                    </div>
                    <div class="card-body">
                        @if(isset($schedule))
                            <form action="{{route('employee.schedule.update',$schedule->schedule_id)}}" method="POST">
                                @method('PATCH')
                        @else
                            <form action="{{route('employee.schedule.store')}}" method="POST">
                        @endif
                            @csrf
                            {{ Form::hidden('employee_id', $employee->employee_id) }}
                            <div class="form-item text-right">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Employee Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name" value="{{$employee->name}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Day</label>
                                    <div class="col-sm-7 text-left">
                                        @foreach($notOnSchedule as $leftdays)
                                            <label class="checkbox-inline"><input name="days[]" type="checkbox" value="{{$leftdays}}">{{$leftdays}}</label>
                                        @endforeach
                                    </div>
                                    <div class="col-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Starting Time</label>
                                    <div class="col-sm-7">
                                        <input type="time" class="form-control" name="starting_time" placeholder="Starting Time" value="{{isset($schedule)? $schedule->starting_time: ''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Ending Time</label>
                                    <div class="col-sm-7">
                                        <input type="time" class="form-control" name="ending_time" placeholder="Ending Time" value="{{isset($schedule)? $schedule->ending_time: ''}}">
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