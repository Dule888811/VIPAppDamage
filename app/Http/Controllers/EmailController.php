<?php


namespace App\Http\Controllers;


use App\User;
use Carbon\Carbon;
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
        $user->email_verified_at = Carbon::now();
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->remember_token = Str::random(60);
        $user->password = Hash::make($request->doctor_password);
        $user->save();
         return view('welcome');
    }
    public function warning()
    {
        return view('emails.warning');
    }

}