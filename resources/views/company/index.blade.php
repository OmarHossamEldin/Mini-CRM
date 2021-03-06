@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('companies.create')}}" class="btn btn-primary">Create</a>
    <div class="row ">
        @foreach($companies as $company)
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
                <a href="companies/{{$company->id}}/edit" class="btn btn-primary">edit</a>
                <a href="companies/{{$company->id}}/" class="btn btn-info">show</a>
                <form action="{{route('companies.destroy', $company->id)}}" method="post" style='display:inline-block' >
                @csrf 
                @method('DELETE')
                        <button class="btn btn-danger">delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{$companies->links()}}
    </div>
</div>
@endsection