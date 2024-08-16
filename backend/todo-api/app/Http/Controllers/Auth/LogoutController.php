<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Auth\LogoutUser;

class LogoutController extends Controller
{
    protected $logoutUser;

    public function __construct(LogoutUser $logoutUser)
    {
        $this->logoutUser = $logoutUser;
    }

    public function __invoke(Request $request)
    {
        return $this->logoutUser->execute($request->user());
    }
}
