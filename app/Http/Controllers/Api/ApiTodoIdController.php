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
        $data = Todo::all()->sortByDesc('id');
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
        // prüfe ob Datensatz gefunden wurde
        if($todo) {
            $this->data = new TodoResource($todo);
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
     * @param  Request  $request
     * @return Response
     */
    public function store(ApiTodoRequest $request)
    {
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
            if($todo) {
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
