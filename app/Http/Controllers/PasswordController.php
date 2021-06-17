<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

class PasswordController extends Controller
{
    use PasswordValidationRules;

    public function index($username)
    {
        if (auth()->user()->name !== $username) {
            return redirect()->back();
        }

        $user = collect(DB::select("SELECT id FROM users WHERE name = '$username' LIMIT 1"))->first();

        return view('password', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => $this->passwordRules(),
        ]);

        if (!Hash::check($request->input('current_password'), auth()->user()->password)) {
            return redirect()->back()->withErrors('Your current password was not correct.');
        }

        $newPassword = Hash::make($request->input('password'));
        DB::update("UPDATE users SET `password` = '$newPassword' WHERE id = " . auth()->user()->id . "");

        return redirect()->back()->with('success', 'Your password has been updated');
    }
}
