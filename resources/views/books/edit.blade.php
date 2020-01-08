@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 class="mb-3">Update a Book</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('books.update', $books->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required="true" value={{ $books->name }} />
            </div>
            <div class="form-group">
                <label for="release_date">Release Date:</label>
                <input type="date" class="form-control" name="release_date" required="true" value={{ $books->release_date }} />
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <select class="form-control" name="author" required="true">
                    <option value="{{$books->author}}">{{ authorName($books->author) }}</option>
                    @foreach($authors as $tekAuthor)
                    <option value="{{$tekAuthor->id}}">{{$tekAuthor->name}}</option>
                    @endforeach
                </select>
            </div> 
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection