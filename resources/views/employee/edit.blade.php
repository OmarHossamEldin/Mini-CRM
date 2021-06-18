@extends('layouts.app')

@section('content')
<div class="container">
    <form  action="{{route('employees.update', $employee->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-4">
        <label for="name" class="form-label">FirstName</label>
            <input type="text" class="form-control" name='firstName' value="{{$employee->firstName}}" required>
        </div>
        <div class="mb-4">
            <label for="name" class="form-label">LastName</label>
            <input type="text" class="form-control" name='lastName' value="{{$employee->lastName}}" required>
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name='email' value="{{$employee->email}}" required>
        </div>
        <div class="mb-4">
            <label for="company" class="form-label">Company</label>
            <select type="text" class="form-control" name='company_id'  required>
                <option value="{{$employee->company->id}}">{{$employee->company->name}}</option>
                @foreach($companies as $company)
                    @if($company->id !== $employee->company->id)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <button class="form-control btn btn-success">update</button>
            <a href="{{route('employees.index')}}" class="form-control btn btn-primary" style='margin-top:10px;'>back</a>
        </div>
    </form>
    
</div>
@endsection