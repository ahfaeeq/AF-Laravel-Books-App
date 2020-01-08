@extends('layouts/app')

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
    <h3 class="float-left">Available Authors</h3>    
    @auth
      <a href="{{ route('authors.create')}}" class="btn btn-primary float-right">Publish new Author</a>
    @endauth
    <div class="clearfix mb-3"></div>
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Age</td>
            <td>Address</td>
            <td>Number of Books</td>
            @auth
              <td colspan = 2>Actions</td>
            @else
              <td>Actions</td>
            @endauth
          </tr>
      </thead>
      <tbody>
          @foreach($authors as $author)
          <tr>
              <td>{{$author->id}}</td>
              <td>{{$author->name}}</td>
              <td>{{$author->age}}</td>
              <td>{{$author->address}}</td>
              <td>{{countBooks($author->id)}}</td>
              @auth
              <td>
                  <a href="{{ route('authors.edit',$author->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                  <form action="{{ route('authors.destroy', $author->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
              @else
              <td>Login in term to edit or delete</td>
              @endauth
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
</div>
@endsection