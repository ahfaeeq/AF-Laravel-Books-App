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
      <h3 class="float-left">Available Books</h3>    
      @auth
        <a href="{{ route('books.create')}}" class="btn btn-primary float-right">Publish new Book</a>
      @endauth
      <div class="clearfix mb-3"></div>
        @foreach($books->chunk(4) as $books)
          <div class="row m-b-10">
              @foreach($books as $book)
              <div class="col-lg-3 col-sm-12 m-b-10">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$book->name}}</h5>
                    <p class="card-text">Released on {{$book->release_date}} by {{ authorName($book->author)->name }}</p>
                    @auth
                    <form action="{{ route('books.destroy', $book->id)}}" method="post">
                        <a href="{{ route('books.edit',$book->id)}}" class="btn btn-sm btn-light">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-light" type="submit">Delete</button>
                    </form>
                    @endauth
                  </div>
                </div>
              </div>
              @endforeach
          </div>
        @endforeach
  <div>
</div>
@endsection