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

    public function fake($jumlah)
    {
        if (Auth::user()->role_id !== 'root') {
            return response()->json([
                'status' => 'forbidden',
                'message' => 'MAU NGAPAIN BOSS??.',
            ], 403);
        }

        $users = User::where('role_id', 'user')
            ->whereNotIn('email', function ($query) {
                $query->select('email')->from('visitors');
            })
            ->take($jumlah)->get();

        $berhasil = 0;

        foreach ($users as $user) {
            // Atur Jam
            $now = now();
            $minHour = 9;
            $maxHour = (int) $now->format('H');

            // Kalau sekarang masih sebelum jam 9, pakai jam 9 saja supaya tetap valid
            $randomHour = max($minHour, rand($minHour, $maxHour));
            $randomMinute = rand(0, 59);

            // Simpan
            $success = Visitor::create([
                'barcode' => $user->barcode,
                'name' => $user->name,
                'email' => $user->email,
                'telephone' => $user->telephone,
                'interest' => $user->interest,
                'gate' => Auth::user()->name,
                'created_at' => now()->setTime($randomHour, $randomMinute)
            ]);
            if ($success) {
                $berhasil++;
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => "$berhasil data berhasil dimasukkan ke tabel visitor.",
        ]);
    }
}
