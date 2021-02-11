<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TodoResourse;
use App\Models\Todo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiTodoRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiTodoController extends Controller
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
        $data = TodoResourse::collection($data);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @return Response
     */
    public function show(Todo $todo)
    {
        $todo = new TodoResourse($todo);
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
        $todo = new TodoResourse($todo);
        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param Todo $todo
     * @return Response
     */
    public function update(ApiTodoRequest $request, Todo $todo)
    {
        // validierung läuft schief
        if($request->validator && $request->validator->fails()){
            $todo = ['error' => $request->validator->errors()];
        } // alles ok
        else {
            $todo->update($request->validated());
            $todo = new TodoResourse($todo);
        }
        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        $todo = new TodoResourse($todo);
        return response()->json($todo);
    }
}
