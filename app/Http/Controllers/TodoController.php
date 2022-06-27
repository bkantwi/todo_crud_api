<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'nullable|integer"min:1|max:3',
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
}
