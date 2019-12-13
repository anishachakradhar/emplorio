@extends('layouts.master')

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
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{session ('error')}}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">Enter Interview Schedule</div>

                    <div class="card-body">
                    <form method="post" action="{{route('interviewInfo')}}" enctype="multipart/form-data">
                         @csrf           
                        <input type="hidden" id="applier_id" name="applier_id" value="{{old('id',$applier->id)}}">
                            <div class="form-group">
						        <label for="interview_date">Interview Date</label>
						        <input type="date" id="interview_date" name="interview_date" aria-placeholder="Interview Date">
						    </div>
						    <div class="form-group">
						        <label for="interview_time">Interview Time</label>
						        <input type="time" id="interview_time" name="interview_time" aria-placeholder="Interview Time">
						    </div>
						    <div class="modal-footer">
						        <button type="submit" class="btn btn-primary" >Call for Interview</button>
						    </div>
					                                    
						</form>
                        
                  	</div>
            	</div>
            </div>
    	</div>
    </div>
@endsection