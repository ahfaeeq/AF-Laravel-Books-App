@extends('base')

@section('main')
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
        <a style="margin-bottom: 19px;" href="{{ route('books.create')}}" class="btn btn-primary">New contact</a>
      </div>  

        @foreach($books->chunk(4) as $books)
          <div class="row m-b-10">
              @foreach($books as $book)
              <div class="col-lg-3 col-sm-12 m-b-10">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$book->name}}</h5>
                    <p class="card-text">Released on {{$book->release_date}} by {{$book->author}}</p>
                    <form action="{{ route('books.destroy', $book->id)}}" method="post">
                        <a href="{{ route('books.edit',$book->id)}}" class="btn btn-sm btn-light">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-light" type="submit">Delete</button>
                      </form>
                  </div>
                </div>
              </div>
              @endforeach
          </div>
        @endforeach
  <div>
</div>
@endsection