<?php

namespace App\Repositories;

use App\Damage;
use Illuminate\Http\Request;

interface DamageRepositoriesInterface
{
    public function all();

    public function store(Request $request);

    public function update(Request $request, Damage $damage);
}