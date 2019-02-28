<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    
    public function index()
    {
        $tasks = Todo::orderBy('created_at','desc')->paginate(2);
        return request()->json(200, $tasks);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        if ($todo) {
          $tasks = Todo::orderBy('created_at','desc')->paginate(2);
          return request()->json(200, $tasks);
        }
    }

    
    public function show(Todo $task)
    {
        //
    }

   
    public function edit(Todo $task)
    {
        return request()->json(200, $task);
    }

    
    public function update(Request $request, Todo $task)
    {
        $task->name = $request->name;
        if ($task->save()) {
            $tasks = Todo::orderBy('created_at','desc')->paginate(2);
            return request()->json(200, $tasks);
        }

    }

   
    public function destroy(Todo $task)
    {
        //
    }
}
