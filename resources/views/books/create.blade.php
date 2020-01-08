@extends('layouts/app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h2 class="mb-3">Add a new book</h2>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
      <form method="post" action="{{ route('books.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" required="true"/>
          </div>

          <div class="form-group">
              <label for="release_date">Release Date:</label>
              <input type="text" class="form-control" name="release_date" required="true"/>
          </div>

          <div class="form-group">
              <label for="author">Author:</label>
              <input type="text" class="form-control" name="author" required="true"/>
          </div>
          <button type="submit" class="btn btn-primary">Publish</button>
      </form>
  </div>
</div>
</div>
@endsection