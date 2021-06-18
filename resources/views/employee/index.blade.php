@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('employees.create')}}" class="btn btn-primary">Create</a>
    <div class="row ">
        @foreach($employees as $employee)
        <div class="card col-12" style="margin-top:20px;">
            <div class="card-body">
                <h2 ><strong> Work For: {{$employee->company->name}}</strong></h2><br>
                <h4 class="card-title"><strong>Full Name: {{$employee->firstName . $employee->lastName }}</strong></h4>
                <ul>
                    <li>Email: {{$employee->email}}</li>
                </ul>
                <p class="card-text">
                    <small class="text-muted">Last updated {{$employee->updated_at->diffForHumans()}}</small>
                </p>
                <a href="employees/{{$employee->id}}/edit" class="btn btn-primary">edit</a>
                <a href="employees/{{$employee->id}}/" class="btn btn-info">show</a>
                <form action="{{route('employees.destroy', $employee->id)}}" method="post" style='display:inline-block' >
                @csrf 
                @method('DELETE')
                        <button class="btn btn-danger">delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{$employees->links()}}
    </div>
</div>
@endsection