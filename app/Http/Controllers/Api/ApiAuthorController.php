<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiAuthorRequest;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Author::all();
        $data = AuthorResource::collection($data);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $item = Author::find($id);
        // prüfe ob Datensatz gefunden wurde
        if($item) {
            $item->data = new AuthorResource($item);
        }
        // wenn nicht dann array mit fehlermeldung ausgeben
        else {
            $item = ['error' => 'not found'];
        }

        return response()->json($item);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ApiAuthorRequest $request)
    {
        $item = Author::create($request->validated());
        $item = new AuthorResource($item);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ApiAuthorRequest $request, $id)
    {
        // validierung läuft schief
        if($request->validator && $request->validator->fails()) {
            $item = ['error' => $request->validator->errors()];
        } // alles ok
        else {
            $item = Author::find($id);
            if($item) {
                $item->update($request->validated());
                $item = new AuthorResource($item);
            } else {
                $item = ['error' => 'not found'];
            }
        }

        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Author::find($id);
        if($item) {
            $item->delete();
            $item = new AuthorResource($item);
        } else {
            $item = ['error' => 'not found'];
        }
        return response()->json($item);
    }
}
