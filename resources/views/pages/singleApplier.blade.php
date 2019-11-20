@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Individual information</h1>
    </div>
    <div class="col-sm-6 offset-2 jumbotron">
        <p style="font-size:160%">
            <li>ID: {{$singleApplier->id}}</li>
            <li>Name: {{$singleApplier->full_name}} </li>
            <li>Email: {{$singleApplier->email}}</li>
            <li>Contact number: {{$singleApplier->contact_no}}</li>
            <li>Applied area: {{$singleApplier->area_applied}}</li>
            <li>Cover letter: {{$singleApplier->cover_letter}}</li>
            <li>Expectation: {{$singleApplier->expectation}}</li>
            <li>Is it required by college ?: {{$singleApplier->required_by_college}}</li>
            <li>Applied by: {{$singleApplier->apply_by}}</li>
            <li>CV: {{$singleApplier->CV}}</li>
            <li>Earliest date to join: {{$singleApplier->earliest_date}}</li>
        </p>
        
    </div>
</div>
@endsection