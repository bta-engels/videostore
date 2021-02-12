<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiAuthorRequest;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function PHPUnit\Framework\throwException;


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
        $author = Author::find($id);
        if($author) {
            $author = new AuthorResource($author);
        }
        else {
            $author = ['error' => 'not found'];
        }
        return response()->json($author);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ApiAuthorRequest $request)
    {
        $author = Author::create($request->validated());
        $author = new AuthorResource($author);
        return response()->json($author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(ApiAuthorRequest $request, $id)
    {
        if ($request->validator && $request->validator->fails()) {
            $author = ['error' => $request->validator->errors()];
        }
        else {
            $author = Author::find($id);
            if ($author) {
                $author->update($request->validated());
                $author = new AuthorResource($author);
            } else {
                $author = ['error' => 'not found'];
            }
        }
        return response()->json($author);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        if ($author) {
            $author->delete();
            $author = new AuthorResource($author);
        } else {
            $author = ['error' => 'not found'];
        }
        return response()->json($author);
    }

    public function error() {
        return response()->json(['error' => 'route not found']);
    }
}
