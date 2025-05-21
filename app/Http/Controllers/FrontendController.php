<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;

class FrontendController extends Controller
{
    public function profile($uuid)
    {
        $user = User::where('id', $uuid)->first();
        return view('profile', compact('user'));
    }

    public function jodiKoplak()
    {
        Visitor::where('gate', 'Gate 2')->update(['gate' => 'opening ceremony']);
        return '<h1>udeh ya jod, payah</h1>';
    }
}
