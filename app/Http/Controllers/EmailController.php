<?php

namespace App\Http\Controllers;

use App\Mail\SendBarcode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function SendBarcode($uuid)
    {
        $user = User::where('id', $uuid)->first();
        // dd($user->email);

        try {
            Mail::to($user->email)->send(new SendBarcode($user));
        } catch (\Exception $e) {
            Log::error('Mail error: ' . $e->getMessage());
        }
        return redirect('user/' . $uuid)->with('success', 'Email berhasil dikirim');
    }
}
