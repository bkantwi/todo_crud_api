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

//    Getting data on a single _todo_list
    public function gather_single(Request $request, $id){
        $gather_single = Todo::find($id);

//        Returning JSON once more
        return response()->json([
            'status' =>true,
            'message' => 'Here you go.',
            'data' => $gather_single,
        ],201);
    }

    //    Updating todo_list
    public function update(Request $request, $id){

        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'priority' => 'nullable|integer|min:1|max:3',
            'done' => 'boolean',
        ]);

//        Find to do first before update.
        $update = Todo::find($id);

//        Update to do if record found else throw an error
        if($update){
            $update->update($data);

            return response()->json([
                'status' =>true,
                'message' => 'Todo Update.',
                'data' => $update,
            ]);

        }else{
            return response()->json([
                'status' =>false,
                'message' => 'Todo Not Found.',
                'data' => null,
            ],404 );
        }

    }

}
