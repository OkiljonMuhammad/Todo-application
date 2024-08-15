<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller implements HasMiddleware
{   
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Todo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> "required|max:255",
            'content'=> "required",
        ]);

        $request->user()->todo()->create($data);

        return "Saqlandi.";
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
       return $todo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        Gate::authorize('modify', $todo);
        $data = $request->validate([
            'title'=> "required|max:255",
            'content'=> "required",
        ]);

        $todo->update($data);

        return "O'zgartirildi.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {  
       Gate::authorize('modify', $todo);
       $todo->delete();
       return "O'chirildi";
    }
}
