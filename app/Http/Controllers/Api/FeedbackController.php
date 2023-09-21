<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request, User $user)
    {
        $users = $user->all();

        return $users;
    }

}
