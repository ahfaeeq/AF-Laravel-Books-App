@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 class="mb-3">Update a Author</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('authors.update', $authors->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required="true" value={{ $authors->name }} />
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" class="form-control" name="age" required="true" value={{ $authors->age }} />
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" required="true" value={{ $authors->address }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection