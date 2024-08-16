<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Auth\LoginUser;

class LoginController extends Controller
{
    protected $loginUser;

    public function __construct(LoginUser $loginUser)
    {
        $this->loginUser = $loginUser;
    }

    public function __invoke(Request $request)
    {
        return $this->loginUser->execute($request);
    }
}
