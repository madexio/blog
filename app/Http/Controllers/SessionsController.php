<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view("sessions.create");
    }

    public function store()
    {
        $attributes = request()->validate([
            "email"    => ["required", "email"],
            "password" => ["required"],
        ]);

        if (!auth()->attempt($attributes))
        {
            throw ValidationException::withMessages([
                "email"=>"Your provided credentials could not be validated"
            ]);
        }

        session()->regenerate();
        return redirect("/")->with("success", "Logged in successfully");
    }

    public function destroy()
    {
        auth()->logout();
        return redirect("/")->with("success", "Logged out successfully");
    }
}
