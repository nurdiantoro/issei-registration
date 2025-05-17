<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::where('gate', Auth::user()->name)->orderBy('created_at', 'desc')->limit(10)->get();
        return view('checkin', compact('visitors'));
    }

    public function store(Request $request)
    {
        $user = User::where('barcode', $request->barcode)->first();

        // Cek Barcode bener apa engga
        if (!$user) {
            return redirect()->back()->with('barcode_not_exists', 'Barcode Not Found, Please Check Again.');
        }

        // Cek udah scan apa belom 1 menit terakhir
        $recentCheckin = Visitor::where('barcode', $request->barcode)
            ->where('created_at', '>=', now()->subMinute())
            ->first();

        if ($recentCheckin) {
            return redirect()->back()->with('barcode_exists', 'Barcode Found.');
        }

        Visitor::create([
            'barcode' => $request->barcode,
            'name' => $user->name,
            'email' => $user->email,
            'telephone' => $user->telephone,
            'interest' => $user->interest,
            'gate' => Auth::user()->name,
        ]);

        return redirect()->back()->with('barcode_exists', 'Barcode Found.');
    }
}
