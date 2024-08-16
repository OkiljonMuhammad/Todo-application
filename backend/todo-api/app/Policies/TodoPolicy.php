<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{
   
    public function modify(User $user, Todo $post): Response
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny("You don't delete this note");
    }
}
