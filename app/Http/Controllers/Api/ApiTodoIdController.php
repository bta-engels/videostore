<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiTodoRequest;
use App\Http\Resources\TodoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function PHPUnit\Framework\throwException;

class ApiTodoIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Todo::all();
        // @todo: add ressoure class here
        $data = TodoResource::collection($data);
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
        $todo = Todo::find($id);
        // prüfe ob Datensatz gefunden wurde
        if($todo) {
            $todo = new TodoResource($todo);
        }
        // wenn nicht dann array mit fehlermeldung ausgeben
        else {
            $todo = ['error' => 'not found'];
        }

        return response()->json($todo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ApiTodoRequest $request)
    {
        $todo = Todo::create($request->validated());
        $todo = new TodoResource($todo);
        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ApiTodoRequest $request, $id)
    {
        // validierung läuft schief
        if($request->validator && $request->validator->fails()) {
            $todo = ['error' => $request->validator->errors()];
        } // alles ok
        else {
            $todo = Todo::find($id);
            if($todo) {
                $todo->update($request->validated());
                $todo = new TodoResource($todo);
            } else {
                $todo = ['error' => 'not found'];
            }
        }

        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if($todo) {
            $todo->delete();
            $todo = new TodoResource($todo);
        } else {
            $todo = ['error' => 'not found'];
        }
        return response()->json($todo);
    }

    public function error(){
        return response()->json(['error' => 'route not found']);
    }
}
