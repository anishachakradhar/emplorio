@extends('layouts.apply')

@section('content')
    <div class="container">
        <div class="container col-md-6">
            <div class="row justify-content-center">
                <div class="col-sm-8 offset-sm-2">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session ('success')}}
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
                </div>
                <div class="card">
                    <div class="card-header">Apply for internship</div>

                    <div class="card-body">
                        <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                            {{-- {{dd($process)}} --}}
                            @csrf
                            <div class="form-group row">
                                <label for="name">Full Name</label>
                                <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name') }}" autofocus>
                                <span style="color: red">{{$errors->first('full_name')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                <span style="color: red">{{$errors->first('email')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="email">Contact Number</label>
                                <input type="text" name="contact_no" id="contact_no" class="form-control" value="{{ old('contact_no') }}">
                                <span style="color: red">{{$errors->first('contact_no')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="position">Choose the area applying for</label>
                                <br>
                                <select name="areaOfInterest" value="{{ old('areaOfInterest') }}">
                                    @foreach($posts as $post)
                                        <option value="{{$post->posts}}">{{$post->posts}}</option>
                                    @endforeach
                                    {{-- <option value="App Developer">Web and Application Developer - PHP Laravel</option>
                                    <option value="Wordpress Developer">WordPress Developer</option>
                                    <option value="Social Media Manager">Social Media Manager/Analyst</option>
                                    <option value="Graphic Designer">Graphic Designer</option>
                                    <option value="Management Intern">Management Intern</option> --}}
                                </select>
                                <span style="color: red">{{$errors->first('areaOfInterest')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="coverLetter">Cover Letter</label>
                                <textarea name="coverLetter" style="width:500px; height:200px;" value="{{ old('coverLetter') }}">Type your Cover letter here.</textarea>
                                <span style="color: red">{{$errors->first('coverLetter')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="expectation">What do you expect from this internship?</label>
                                <textarea name="expectation" style="width:500px; height:200px;" value="{{ old('expectation') }}"></textarea>
                                <span style="color: red">{{$errors->first('expectation')}}</span>
                            </div>

                            <div class="form-group row">
                                <label>Is this internship required by your course/college?</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="internRequired" id="internRequired" value="yes">
                                <label class="form-check-label">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="internRequired" id="internRequired" value="no">
                                <label class="form-check-label">No</label>
                            </div>

                            <div class="form-group row">
                                <label>I want to apply by</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="applyBy" id="applyBy" value="direct">
                                <label class="form-check-label" >Direct Application (Regular Process)</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="applyBy" id="applyBy" value="taking_challenge">
                                <label class="form-check-label" >Taking Internship Challenge</label>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="CV">Upload your CV *(Max. 5MB)</label>
                                <input type="file" name="CV" id="CV" class="form-control" >
                                <span style="color: red">{{$errors->first('CV')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="date">If selected for internship, when's the earliest you can join us?</label>
                                <input type="date" name="earliest_date" id="earliest_date" class="form-control" value="{{ old('earliest_date') }}">
                                <span style="color: red">{{$errors->first('date')}}</span>
                            </div>

                            <input type="checkbox" name="agree" value="agree"> By submitting form, you confirm that you've read the Internship FAQ Page and that you understand about Internship at Technorio.<br>

                            <div class="form-group float-right">
                                <button class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>
                    </div>
            </div>
            </div>
    </div>
    </div>
@endsection

