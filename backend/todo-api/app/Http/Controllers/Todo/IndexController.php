<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;

class IndexController extends Controller
{
    public function __invoke()
    {
        return Todo::all();
    }
}

