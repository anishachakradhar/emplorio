@extends('layouts.master')
@section('content')
    <div class="row" {overflow="auto"}>
        <div class="col-sm-12">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <h1>Interview Schedule</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Applier Name</td>
                    <td>Interview Date</td>
                    <td>Interview Time</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($schedules as $interview)
                    <tr>
                        <td>{{$interview->id}} </td>
                        <td>{{$interview->applier->full_name}}</td>
                        <td>{{$interview->interview_date}}</td>
                        <td>{{$interview->interview_time}}</td>
                        <td>
                            <form action="" method="post" >
                                    @csrf
                                    <div class="form-group" >
                                        <button type="submit" class="btn btn-primary" value="Edit" name="response">
                                            Edit
                                        </button>  
                                    </div>
                            </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-group" >
                                        <button href="" class="btn btn-danger" type="submit" name="response" value="Delete">
                                            Delete
                                        </button>
                                    </div>
                                </form>
                            </td>        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection