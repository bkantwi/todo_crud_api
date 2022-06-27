<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
//    Creating a Todo_list
    public function store(Request $request){

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'nullable|integer|min:1|max:3',
            'done' => 'boolean',
        ]);

        $todo = Todo::create($data);

//        Returning JSON
        return response()->json([
            'status' =>true,
            'message' => 'Todo created.',
            'data' => $todo,
        ],201);
    }

//    Getting all todo_data
    public function posts(Request $request){
        $gather = Todo::all();

//        Returning JSON once more
        return response()->json([
            'status' =>true,
            'message' => 'Here you go.',
            'data' => $gather,
        ],201);
    }
}
