@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('employees.index')}}" class="form-control btn btn-primary" style='margin-top:10px;'>back</a>
    <div class="row ">
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
            </div>
        </div>
    </div>
</div>
@endsection