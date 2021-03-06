<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Authors;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();
        $authors = Authors::all();
        return view('books.index', compact('books','authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Authors::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'release_date'=>'required',
            'author'=>'required'
        ]);

        $books = new Books([
            'name' => $request->get('name'),
            'release_date' => $request->get('release_date'),
            'author' => $request->get('author')
        ]);
        $books->save();
        return redirect('/books')->with('success', 'Book saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Books::find($id);
        $authors = Authors::all();
        return view('books.edit', compact('books','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'release_date'=>'required',
            'author'=>'required'
        ]);

        $book = Books::find($id);
        $book->name =  $request->get('name');
        $book->release_date = $request->get('release_date');
        $book->author = $request->get('author');
        $book->save();

        return redirect('/books')->with('success', 'Book updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = Books::find($id);
        $books->delete();

        return redirect('/books')->with('success', 'Book deleted!');

    }
}
