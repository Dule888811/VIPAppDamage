<?php

namespace App\Http\Controllers\Admin;


use App\Center;
use App\Damage;
use App\Http\Controllers\Controller;

use App\Mail\ProvidePassword;
use App\Repositories\UserRepositories;
use App\Repositories\UserRepositoriesInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private $userRepositories;
    public function __construct(UserRepositoriesInterface $userRepositories)
    {
        $this->userRepositories = $userRepositories;
    }

    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = $this->userRepositories->store($request);
        Mail::to($user)->send(new ProvidePassword($user));
        return redirect()->route('admin.main');
    }

    public function showDanger(User $user)
    {
        return view('emails.password')->with(['user' => $user]);
    }

    public function delete(Damage $damage)
    {

        $damage->delete();
        return redirect()->route('admin.main');
    }

    public function changeStatus(Damage $damage)
    {
        return view('admin.center.status')->with(['damage' => $damage]);
    }

    public function soreStatus(Request $request,Damage $damage)
    {
        $damage->status = $request->not_resolved;
        $damage->update();
        return redirect()->route('admin.main');
    }

    public function deleteDamage(Damage $damage)
    {
        return view('admin.center.deleteDamage')->with(['damage' => $damage]);
    }






}
