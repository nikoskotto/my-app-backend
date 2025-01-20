<?php

namespace App\Http\Controllers;

use App\Models\Kitchen;
use Illuminate\Http\Request;
use App\Models\User;

class KitchenController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'nome' => 'required',
            'indirizzo' => 'required',
            'citta' => 'required',
            'cap' => 'required',
        ]);

        Kitchen::create([
            'nome' => $request->nome,
            'indirizzo' => $request->indirizzo,
            'citta' => $request->citta,
            'cap' => $request->cap,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['message' => 'Nuova cucina creata'], 201);
    }

    public function getKitchenId(Request $request){
        $kitchen = Kitchen::where('user_id', $request->user_id)->first();
        $owner = User::where('id', $kitchen->user_id)->value('email');
        $kitchen->owner = $owner;
        $workers = User::where('kitchen_id', $kitchen->id)->get();
        return response()->json(['kitchen' => $kitchen, 'workers' => $workers], 200);
    }

    public function addWorker(Request $request){
        $request->validate([
            'email' => 'required',
            'kitchen_id' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json(['message' => 'Utente non trovato'], 404);
        }
        $user->update([
            'kitchen_id' => $request->kitchen_id
        ]);
        
        return response()->json(['message' => 'Nuovo lavoratore aggiunto'], 201);
    }
}
