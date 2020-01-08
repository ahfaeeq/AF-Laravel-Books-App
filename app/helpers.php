<?php
use App\Authors;
use App\Books;

if (!function_exists('authorName')) {
  function authorName($id)
  {
    $author = Authors::find($id);
    return $author;
  }
}

if (!function_exists('countBooks')) {
  function countBooks($id)
  {
    $booksCount =Books::where('author', $id)->count();
    return $booksCount;
  }
}