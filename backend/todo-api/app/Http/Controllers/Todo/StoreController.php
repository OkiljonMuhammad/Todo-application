<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'item' => 'required|string|max:255',
            'completed'=>'required|boolean',
        ]);

        $todo = Todo::create($validated);
        return response()->json(['todo' => $todo]);
    }
}

