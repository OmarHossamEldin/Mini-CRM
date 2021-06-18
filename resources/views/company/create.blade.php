@extends('layouts.app')

@section('content')
<div class="container">
    <form  action="{{route('companies.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="logo" class="form-label">Logo</label>
            <input class="form-control" type="file" name='logo'  accept="image/*" required>
        </div>
        <div class="mb-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name='name' required>
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name='email' required>
        </div>
        <div class="mb-4">
            <label for="website" class="form-label">Website</label>
            <input type="text" class="form-control" name='website' required>
        </div>
        <div class="mb-4">
            <button class="form-control btn btn-success">save</button>
            <a href="{{route('companies.index')}}" class="form-control btn btn-primary" style='margin-top:10px;'>back</a>
        </div>
    </form>
</div>
@endsection