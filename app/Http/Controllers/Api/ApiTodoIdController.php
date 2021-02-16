<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use App\Http\Requests\ApiTodoRequest;
use App\Http\Resources\TodoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiTodoIdController extends ApiController
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
        $this->data = TodoResource::collection($data);
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
        $todo = Todo::find($id);
//        Prüfe, ob Datensatz gefunden wurde
        if($todo) {
            // Überschreibe $todo mit gewünschter Form wie in TodoResource festgelegt
            $todo = new TodoResource($todo);
        }
//        Falls kein Datensatz existiert: selbst genierierte Fehlermeldung
        else {
            $this->error = 'not found';
        }

        return $this->getResponse();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ApiTodoRequest $request)
    {
//        Direkte Prüfung, ob user Schreibrechte hat (falls nicht in Routen definiert)
//        if($request->user()->tokenCan('write')) {
//            die('ja, kann schreiben');
//        } else {
//            die('nein, darf nicht schreiben');
//        }
        $todo = Todo::create($request->validated());
        $todo = new TodoResource($todo);
        if($request->validator && $request->validator->fails()) {
            $this->error = $request->validator->errors();
        } // alles ok
        else {
            $todo = Todo::create($request->validated());
            $this->data = new TodoResource($todo);
        }
        return $this->getResponse();
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
            $this->error = $request->validator->errors();
        } // alles ok
        else {
            $todo = Todo::find($id);
            // falls Datensatz existiert, aktualisiere ihn
            if ($todo) {
                $todo->update($request->validated());
                $this->data = new TodoResource($todo);
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
        $todo = Todo::find($id);
        if($todo) {
            $todo->delete();
            $this->data = new TodoResource($todo);
        } else {
            $this->error = 'not found';
        }
        return $this->getResponse();
    }
}
