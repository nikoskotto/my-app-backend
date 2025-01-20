<?php

namespace App\Http\Controllers;

use App\Models\Kitchen;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function get(Request $request){
        // try {
        //     $suppliers = Kitchen::where('id', $request->kitchen_id)->first()->suppliers()->get();
        // } catch (\Throwable $th) {
        //     return response()->json(['message' => $th], 500);
        // }
        $suppliers = Kitchen::where('id', $request->kitchen_id)->first()->suppliers()->get();

        return response()->json(['suppliers' => $suppliers], 200);

    }
}
