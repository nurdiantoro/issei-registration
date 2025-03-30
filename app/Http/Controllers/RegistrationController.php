<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function registration()
    {
        return view('registration');
    }

    public function create(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return back()->with('email_exists', 'Email already exists');
        }

        // Validate form
        Validator::make($request->all(), [
            'name'          => ['required', 'string', 'max:255'],
            'salutation'    => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'max:255', 'email',  'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'telephone'     => ['required', 'string', 'max:255'],
            'company'       => ['required', 'string', 'max:255'],
            'job'           => ['required', 'string', 'max:255'],
        ]);

        // Generate unique barcode
        $barcode = rand(100000000, 999999999);
        while (User::where('barcode', $barcode)->exists()) {
            $barcode = rand(100000000, 999999999);
        }

        // Create user
        $user = User::create([
            'barcode' => $barcode,
            'salutation' => $request->salutation,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telephone' => $request->telephone,
            'company' => $request->company,
            'job' => $request->job,
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
