<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    public function store(Request $request){
        Linea::create([
            'index' => $request->index,
            'todo' => $request->todo,
            'kitchen_id' => $request->kitchen_id,
            'user_id' => $request->user_id
        ]);

        return response()->json(['message' => 'Todo creato correttamente'], 200);
    }

    public function delete(Request $request){
        $linea = Linea::where('todo', $request->todo)->where('kitchen_id', $request->kitchen_id)->where('user_id', $request->user_id)->first();
        $linea->delete();

        return response()->json(['message' => 'Todo eliminato correttamente'], 200);
    }

    public function get(Request $request){
        $linea = Linea::where('kitchen_id', $request->kitchen_id)->select('todo', 'index')->get();
        $lineaProg = Linea::where('prog', true)
        ->whereNotNull('prog_name')
        ->distinct('prog_name')
        ->select('prog_name', 'data_inizio', 'data_fine')
        ->get();


        return response()->json(['linea' => $linea, 'lineaProg' => $lineaProg], 200);
    }

    public function createLineaProg(Request $request){
        $progTodoList = Linea::where('prog', true)->where('prog_name', $request->nome)->where('kitchen_id', $request->kitchen_id)->select('todo')->get();
        $data_inizio = Carbon::parse($request->data_inizio)->format('Y-m-d');
        $data_fine = Carbon::parse($request->data_fine)->format('Y-m-d');
        foreach($request->todo_list as $todo){
            if($progTodoList->count() > 0 && !$progTodoList->contains('todo', $todo['todo'])){
                Linea::create([
                    'index' => $todo['index'],
                    'todo' => $todo['todo'],
                    'prog' => true,
                    'prog_name' => $request->nome,
                    'data_inizio' => $data_inizio,
                    'data_fine' => $data_fine,
                    'kitchen_id' => $request->kitchen_id,
                    'user_id' => $request->user_id
                ]);
            } else if($progTodoList->count() == 0){
                try {
                    Linea::create([
                        'index' => $todo['index'],
                        'todo' => $todo['todo'],
                        'prog' => true,
                        'prog_name' => $request->nome,
                        'data_inizio' => $data_inizio,
                        'data_fine' => $data_fine,
                        'kitchen_id' => $request->kitchen_id,
                        'user_id' => $request->user_id
                    ]);
                } catch (\Throwable $th) {
                    return $th;
                }
            }
        }
        return response()->json(['message' => 'linea programmata creata correttamente'], 200);
    }
}
