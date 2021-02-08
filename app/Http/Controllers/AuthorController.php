<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
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
        //  //Gibt array-Objekt mit Autor-Einträgen zurück
//         $data = Author::all();
        // paginate-Funktion ermöglicht Paginierung -> gib 10 Datensätze pro Block aus
        $data = Author::paginate(10);
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
     * @param AuthorRequest $request
     * @return Response
     */
    public function store(AuthorRequest $request)
    {

//       // Instanziere neue Author-Klasse
//       $author = new Author;
//       // Fülle Spalten mit eingegebenen Daten und speichere den Datensatz
//       $author->firstname = $request->post('firstname');
//       $author->lastname = $request->post('lastname');
//       $author->save();

        // mass assignment
        // Hole benötigte Daten aus Eingegebenem
//       $newData = $request->only( ['firstname', 'lastname']);

        //Kreiere neuen Datensatz mit eingegebenen Daten
//       Author::create($newData);
//
//
//       // Gib Daten der geänderten Tabelle aus
//       return redirect()->route('authors');


        // Automatische Validierung der eingegebenen Daten, falls Fehler: Zurückleitung zu create.blade
        // Legt neuen Datensatz mit eingegebenen daten an
        Author::create($request->validated());
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
        // $request ist, was als durch das Formular abgeschickt wurde
        public function update(AuthorRequest $request, Author $author)
    {
//        // Lese eingegebene Daten aus
//        $firstname = $request->post('firstname');
//        $lastname = $request->post('lastname');
//
//        // überschreibe die Daten in der DB mit den eingegebenen Daten
//        $author->firstname = $firstname;
//        $author->lastname = $lastname;
//
//        // alternativ als Einzeiler
//        // $author->firstname = $request->post(key:'firstname');
//        // $author->lastname = $lastname = $request->post(key:'lastname');
//
//        // speichere geänderte Daten in der Tabelle
//        $author->save();
//
//
//        //  // mass assignment: hole array mit firstname und lastname aus den eingegebenen Daten
//        //  // Achtung! Benötigt gesetzte fillable-Variable im zugehörigen Model
//        // $newData = $request->only( ['firstname', 'lastname']);
//        // $author->update($newData);

        // Update Daten mit eingegebenen, validierten Daten
        $author->update($request->validated());

        // Gib Daten der geänderten Tabelle aus
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
