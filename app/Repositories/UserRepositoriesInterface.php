<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface UserRepositoriesInterface
{
    public function store(Request $request);
}