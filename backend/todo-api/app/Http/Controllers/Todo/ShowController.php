<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;

class ShowController extends Controller
{
    public function __invoke(Todo $todo)
    {
        return response()->json(['todo' => $todo]);
    }
}
