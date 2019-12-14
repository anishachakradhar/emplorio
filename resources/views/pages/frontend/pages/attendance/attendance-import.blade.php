@extends('pages.frontend.layouts.master')

@section('content')
    <div class="row" style="margin: 5%;">
        <div class="col-2"></div>
        <div class="col-8">
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
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
                    Attendance Record
                </div>
                <div class="card-body">
                    <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            {{ Form::hidden('employee_id', $employee->employee_id) }}
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="input-group-text" name="attendance_import">
                                <input class="input-group-text" type="submit">
                            </div>
                        </div>
                    </form>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Date</th>
                            <th scope="col">Day</th>
                            <th scope="col">Check-in</th>
                            <th scope="col">Check-out</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if(isset($employee_for_attendance)) --}}
                                @foreach($attendances as $att)
                                    <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$att->date}}</td>
                                    <td>{{$att->day}}</td>
                                    <td>{{$att->check_in}}</td>
                                    <td>{{$att->check_out}}</td>
                                    </tr>
                                @endforeach
                            {{-- @endif --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection