<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Author::orderBy('id')->paginate(10);
        // bin ich eingeloggt?
        if(Auth::check()) {
            return view('admin.authors.index', compact('data'));
        }
        // oder nicht
        else {
            return view('public.authors.index', compact('data'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function show(Author $author)
    {
        return view('public.authors.show', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorRequest $request
     * @return Response
     */
    public function store(AuthorRequest $request)
    {
/*
        $author = new Author();
        $author->firstname  = $request->post('firstname');
        $author->lastname   = $request->post('lastname');
        $author->save();
*/
        // mass assigment
        // legt neuen autor mit validierten daten an
        Author::create( $request->validated() );
        return redirect()->route('authors');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorRequest $request
     * @param Author $author
     * @return Response
     */
    public function update(AuthorRequest $request, Author $author)
    {
        // werte einzeln zuweisen
/*
        $author->firstname  = $request->post('firstname');
        $author->lastname   = $request->post('lastname');
        // alles speichern in Tabelle authors
        $author->save();
*/

        // oder via 'mass assignment'
        $author->update($request->validated());
        return redirect()->route('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors');
    }
}
