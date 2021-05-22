<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Events\OnUpdated;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Todo::with('translations')->orderBy('id')->paginate(10);
        if(Auth::check()) {
            return view('admin.todos.index', compact('data'));
        }
        // oder nicht
        else {
            return view('public.todos.index', compact('data'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @return Response
     */
    public function show(Todo $todo)
    {
        return view('public.todos.show', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(TodoRequest $request)
    {
        $todo = Todo::create($request->validated());
        event(new OnUpdated($todo, $request->validated()));
        return redirect()->route('todos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Todo $todo
     * @return Response
     */
    public function edit(Todo $todo)
    {
        return view('admin.todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Todo $todo
     * @return Response
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());
        event(new OnUpdated($todo->refresh(), $request->validated()));
        return redirect()->route('todos');
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
        return redirect()->route('todos');
    }
}
