@extends('main')

@section('content')
<div class="row">
  <div class="col-sm-12">

    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
    @endif
  </div>
  <div class="col-sm-12">
      <h1 class="display-3">Available Books</h1>    
      <div>
        <a style="margin: 19px;" href="{{ route('books.create')}}" class="btn btn-primary">New contact</a>
      </div>  
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Release Date</td>
            <td>Author</td>
            <td colspan = 2>Actions</td>
          </tr>
      </thead>
      <tbody>
          @foreach($books as $book)
          <tr>
              <td>{{$book->id}}</td>
              <td>{{$book->name}}</td>
              <td>{{$book->release_date}}</td>
              <td>{{$book->author}}</td>
              <td>
                  <a href="{{ route('books.edit',$book->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                  <form action="{{ route('books.destroy', $book->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
</div>
@endsection