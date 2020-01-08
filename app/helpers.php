<?php
use App\Authors;
use App\Books;

if (!function_exists('authorName')) {
  function authorName($id)
  {
    $author = Authors::find($id);
    if($author){
      return $author->name;
    } else {
      return "Author isn't available";
    }
  }
}

if (!function_exists('countBooks')) {
  function countBooks($id)
  {
    $booksCount =Books::where('author', $id)->count();
    return $booksCount;
  }
}