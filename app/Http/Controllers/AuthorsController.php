<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authors;

class AuthorsController extends Controller
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
        $authors = Authors::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
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
            'age'=>'required',
            'address'=>'required'
        ]);

        $authors = new Authors([
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'address' => $request->get('address')
        ]);
        $authors->save();
        return redirect('/authors')->with('success', 'Author saved!');    }

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
        $authors = Authors::find($id);
        return view('authors.edit', compact('authors'));     }

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
            'age'=>'required',
            'address'=>'required'
        ]);

        $author = Authors::find($id);
        $author->name =  $request->get('name');
        $author->age = $request->get('age');
        $author->address = $request->get('address');
        $author->save();

        return redirect('/authors')->with('success', 'Author updated!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = Authors::find($id);
        $authors->delete();

        return redirect('/authors')->with('success', 'Author deleted!');
    }
}
