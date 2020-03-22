<?php

namespace App\Http\Controllers\Admin;


use App\Center;
use App\Damage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class MainController extends Controller
{
    public function index()
    {

        return view('admin.main.index');
    }




}
