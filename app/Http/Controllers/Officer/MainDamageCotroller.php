<?php


namespace App\Http\Controllers\Officer;
use App\Http\Controllers\Controller;

class MainDamageCotroller extends Controller
{
    public function index()
    {

        return view('officer.main.index');
    }
}