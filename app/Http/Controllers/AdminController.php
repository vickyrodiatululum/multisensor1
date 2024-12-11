<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('profile.admin', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('added', true);
    }
}
