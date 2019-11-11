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
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">S.N</th>
                <th scope="col">Employee Department Name</th>
                <th scope="col">Employee Department ID</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->department_name}}</td>
                    <td>{{$item->department_id}}</td>
                    <td><a class="btn btn-success" href="{{route('employee.department.edit', $item->department_id)}}" aria-label="Edit"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td>
                        <form action="{{route('employee.department.delete',$item->department_id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" aria-label="Delete">
                            <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-2"></div>
@endsection