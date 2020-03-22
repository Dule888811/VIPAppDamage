<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmailController
{
    public function showForm(User $user)
    {
        return view('emails.password')->with(['user' => $user]);
    }
    public function update(Request $request, User $user)
    {
        $user->remember_token = Str::random(10);
        $user->password = Hash::make($request->doctor_password);
        $user->save();
         return view('welcome');
    }
    public function warning()
    {
        return view('emails.warning');
    }

}