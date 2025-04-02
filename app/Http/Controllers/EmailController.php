<?php

namespace App\Http\Controllers;

use App\Mail\SendBarcode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function SendBarcode($uuid)
    {
        $user = User::where('id', $uuid)->first();
        // dd($user->email);

        Mail::to($user->email)->send(new SendBarcode($user));
        return redirect('/' . $uuid)->with('success', 'Email berhasil dikirim');
    }
}
