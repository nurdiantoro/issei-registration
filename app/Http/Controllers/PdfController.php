<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function index()
    {
        $imagePath = public_path('image/LOGO-ISSEI-2025-COLOR-3-BARIS.png');
        $imageData = base64_encode(file_get_contents($imagePath));
        $logo = 'data:image/jpeg;base64,' . $imageData;

        $user = Auth::user();
        // return view('pdf.barcode', compact('user', 'logo'));
        $pdf = Pdf::loadView('pdf.barcode', compact('user', 'logo'));
        return $pdf->stream($user->barcode . ' - ' . $user->name . '.pdf');
    }
}
