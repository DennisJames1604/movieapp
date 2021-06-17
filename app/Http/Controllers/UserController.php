<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($username)
    {
        if (auth()->user()->name !== $username) {
            return redirect()->back();
        }

        $user = collect(DB::select("SELECT id, name, email FROM users WHERE name = '$username' LIMIT 1"))->first();

        return view('user', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore(auth()->user()->id),
            ]
        ]);

        $newMail = $request->input('email');
        DB::update("UPDATE users SET email = '$newMail' WHERE id = " . auth()->user()->id . "");

        return redirect()->back()->with('success', 'Your email has been updated');
    }
}
