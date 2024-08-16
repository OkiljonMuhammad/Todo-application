<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;

class DestroyController extends Controller
{
    public function __invoke(Todo $todo)
    {
        $todo->delete();
        return response()->json(['message' => 'Todo deleted successfully']);
    }
}

