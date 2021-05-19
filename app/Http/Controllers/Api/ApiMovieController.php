<?php

namespace App\Http\Controllers\Api;

use App\Models\Movie;
use Illuminate\Http\Response;
use App\Http\Resources\MovieResource;
use App\Http\Requests\ApiMovieRequest;

class ApiMovieController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // gib mir 20 movies aus, absteigend sortiert nach id
        $data = Movie::with('author')
            ->get()
            ->sortByDesc('id')
            ->take(20)
        ;
        // @todo: add ressoure class here
        $this->data = MovieResource::collection($data);
        return $this->getResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        // prüfe ob Datensatz gefunden wurde
        if($movie) {
            $this->data = new MovieResource($movie);
        }
        // wenn nicht dann array mit fehlermeldung ausgeben
        else {
            $this->error = 'not found';
        }

        return $this->getResponse();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ApiMovieRequest $request
     * @return Response
     */
    public function store(ApiMovieRequest $request)
    {
        if($request->validator && $request->validator->fails()) {
            $this->error = $request->validator->errors();
        } // alles ok
        else {
            $movie = Movie::create($request->validated());
            $this->data = new MovieResource($movie);
        }
        return $this->getResponse();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ApiMovieRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(ApiMovieRequest $request, $id)
    {
        // validierung läuft schief
        if($request->validator && $request->validator->fails()) {
            $this->error = $request->validator->errors();
        } // alles ok
        else {
            $movie = Movie::find($id);
            if($movie) {
                $movie->update($request->validated());
                $this->data = new MovieResource($movie->refresh());
            } else {
                $this->error = 'not found';
            }
        }

        return $this->getResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if($movie) {
            $movie->delete();
            $this->data = new MovieResource($movie);
        } else {
            $this->error = 'not found';
        }
        return $this->getResponse();
    }
}
