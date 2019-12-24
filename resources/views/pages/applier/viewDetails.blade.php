@extends('layouts.master')
@section('content')
<body>
    <div class="row" {overflow="auto"}>
        <div class="col-sm-12">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <h1>Appliers</h1>
            <table id="applier_id" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Applied For</th>
                        <th>Cover Letter</th>
                        <th>Expectation</th>
                        <th>Required by College</th>
                        <th>Applied By</th>
                        <th>CV</th>
                        <th>Earliest Date to join</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($appliers as $applier)
                    <tr>
                        <td >
                            {{$loop->iteration}}
                            
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
                        <td>
                            <a href="/uploads/{{$applier->CV}}" >
                            {{-- download="{{$applier->CV}}     --}}
                        {{-- <a href="{{asset('public/uploads/Deepika Shrestha L3C10.pdf')}}"> --}}
                            {{$applier->CV}}
                            </a>
                            <br>
                            <a href="" download="{{$applier->CV}} >
                                <button type="button" class="btn btn-primary">
                                    Download
                                </button> 
                            </a>

                        </td>
                        <td>{{$applier->earliest_date}}</td>
                        <td>{{$applier->status}}</td>
                        <td>
                        @if ($applier->status == 'pending')
                            <form action="{{route('approve',$applier->id)}}" method="post" >
                                    @csrf
                                    <div class="form-group" >
                                        <button type="submit" class="btn btn-primary" value="Approved" name="response">
                                            Approve
                                        </button>  
                                    </div>
                            </form>
                            <form action="{{route('reject',$applier->id)}}" method="post">
                                @csrf
                                <div class="form-group" >
                                    <button href="" class="btn btn-danger" type="submit" name="response" value="Rejected">
                                        Reject
                                    </button>
                                </div>
                            </form>
                        
                        
                        @else
                            No actions required.
                        
                        @endif
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>            
        </div>
    </div>
    <script>
            $(document).ready( function () {
                $('#applier_id').DataTable();
            } );
    </script>
        </body>
@endsection