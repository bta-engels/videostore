<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Gibt array-Objekt mit Autor-Einträgen zurück
        $data = Author::all();
        // return dd($data);
        // Prüfe, ob ich eingeloggt bin und zeige dann admin-index
        if(Auth::check()) {
            return view('admin.authors.index', compact('data'));
        }
        // falls nicht eingeloggt, zeige public index
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
//    Dependency injection -> Laravel liefert automatisch das Autor-Objekt, obwohl nur die id übergeben wird
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        die(__METHOD__);
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
     * @param Request $request
     * @param Author $author
     * @return Response
     */
    // $request ist, was als durch das Formular abgeschickt wurde
    public function update(Request $request, Author $author)
    {

//        return redirect()->route('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return Response
     */
    public function destroy(Author $author)
    {
        die(__METHOD__);
    }
}
