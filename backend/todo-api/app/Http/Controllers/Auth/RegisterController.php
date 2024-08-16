<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Auth\RegisterUser;

class RegisterController extends Controller
{
    protected $registerUser;

    public function __construct(RegisterUser $registerUser)
    {
        $this->registerUser = $registerUser;
    }

    public function __invoke(Request $request)
    {
        return $this->registerUser->execute($request);
    }
}
