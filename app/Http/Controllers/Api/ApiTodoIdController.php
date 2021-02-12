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
        // Überschreibe $data-array mit gewünschter Form wie in der TodoResource festgelegt
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
//        Prüfe, ob Datensatz gefunden wurde
        if($todo) {
            // Überschreibe $todo mit gewünschter Form wie in TodoResource festgelegt
            $todo = new TodoResource($todo);
        }
//        Falls kein Datensatz existiert: selbst genierierte Fehlermeldung
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
        // Wenn Validierung schiefläuft, gib den Fehler zurück, der gefunden wurde
        if ($request->validator && $request->validator->fails()) {
            $todo = ['error' => $request->validator->errors()];
        }// wenn alles OK, finde den gewünschten  Datensatz
        else {
            $todo = Todo::find($id);
            // falls Datensatz existiert, aktualisiere ihn
            if ($todo) {
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
// Aufruf, wenn nicht existierende Route eingegeben wurde
    public function error() {
        return response()->json(['error' => 'route not found']);

    }
}
