<?php

namespace App\Http\Controllers;

use App\Models\User;

class FrontendController extends Controller
{
    public function profile($uuid)
    {
        $user = User::where('id', $uuid)->first();
        return view('profile', compact('user'));
    }
}
