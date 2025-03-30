<?php

namespace App\Http\Controllers;

use App\Mail\SendBarcode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function SendBarcode($id)
    {
        $user = User::findOrFail($id);
        // dd($user->email);

        Mail::to($user->email)->send(new SendBarcode($user));
        return redirect('/');
    }
}
