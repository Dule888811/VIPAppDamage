<?php


namespace App\Repositories;


use App\Center;
use App\Mail\ProvidePassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserRepositories implements UserRepositoriesInterface
{
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->user_name;
        $user->role = $request->role;
        $user->email = $request->user_email;
        $user->save();
        return $user;

    }
}