@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('companies.index')}}" class="form-control btn btn-primary" style='margin-top:10px;'>back</a>
    <div class="row ">
        <div class="card col-12" style="margin-top:20px;">
            <img src='{{asset("$company->logo")}}' class="card-img-top" alt="company-logo" height="300" title='company-logo'>
            <div class="card-body">
                <h5 class="card-title"><strong> {{$company->name}}</strong></h5>
                <ul>
                    <li>Email: {{$company->email}}</li>
                    <li>Website: <a href="{{$company->website}}">{{$company->website}}</a></li>
                </ul>
                <p class="card-text">
                    <small class="text-muted">Last updated {{$company->updated_at->diffForHumans()}}</small>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection