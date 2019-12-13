@extends('layouts.master')
@section('content')
    <div class="row" {overflow="auto"}>
        <div class="col-sm-12">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <h1>Approved appliers</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Contact Number</td>
                    <td>Applied For</td>
                    <td>Cover Letter</td>
                    <td>Expectation</td>
                    <td>Required by College</td>
                    <td>Applied By</td>
                    <td>CV</td>
                    <td>Earliest Date to join</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tbody>
                @foreach($appliers as $applier)
                    @if ($applier->status == 'Approved')
                    <tr>
                        <td style="display:none;">
                            {{$applier->id}}
                        </td>
                        <td>
                            <a href="{{ route('singleApplier',$applier->id)}}">
                                {{$applier->full_name}} 
                            </a>
                        </td>
                        <td>{{$applier->email}}</td>
                        <td>{{$applier->contact_no}}</td>
                        <td>{{$applier->area_applied}}</td>
                        <td>{{$applier->cover_letter}}</td>
                        <td>{{$applier->expectation}}</td>
                        <td>{{$applier->required_by_college}}</td>
                        <td>{{$applier->apply_by}}</td>
                        <td>{{$applier->CV}}</td>
                        <td>{{$applier->earliest_date}}</td>
                        <td>{{$applier->status}}</td>
                        <td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection