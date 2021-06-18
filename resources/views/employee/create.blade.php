@extends('layouts.app')

@section('content')
<div class="container">
    <form  action="{{route('employees.store')}}" method="post">
        @csrf
        <div class="mb-4">
        <label for="name" class="form-label">FirstName</label>
            <input type="text" class="form-control" name='firstName'  required>
        </div>
        <div class="mb-4">
            <label for="name" class="form-label">LastName</label>
            <input type="text" class="form-control" name='lastName'  required>
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name='email' required>
        </div>
        <div class="mb-4">
            <label for="company" class="form-label">Company</label>
            <select type="text" class="form-control" name='company_id'  required>
                @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <button class="form-control btn btn-success">save</button>
            <a href="{{route('employees.index')}}" class="form-control btn btn-primary" style='margin-top:10px;'>back</a>
        </div>
    </form>
    
</div>
@endsection