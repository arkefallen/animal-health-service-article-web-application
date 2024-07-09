<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        try {
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);
        } catch (\Throwable $th) {
            return redirect('/password')->with('failed_update_password', 'Gagal memperbarui password: '.$th->getMessage());
        }
        return redirect('/dashboard')->with('success_update_password', 'Berhasil memperbarui password!');
    }

    public function index() {
        return view('layouts/auth/update-password');
    }
}
