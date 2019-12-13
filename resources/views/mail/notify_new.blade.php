<html>
<head>

</head>
<body>
    <div>
        <p>A new application has been recieved with the following details. </p>
        <p>Name: {{ $applier->full_name}}</p>
        <p>Email: {{ $applier->email }}</p>
        <p>Applied for: {{ $applier->area_applied }}</p>
        <a href="{{ route('singleApplier',$applier->id) }}">
            <button class="btn btn-primary" type="button">More info</button>
        </a>
        {{-- <form action="{{route('show')}}" method="post">
            @csrf
            <button class="btn btn-primary" type="submit">More info</button>
        </form> --}}
    </div>
</body>
</html>
