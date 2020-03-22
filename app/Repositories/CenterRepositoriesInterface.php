<?php

namespace App\Repositories;

use App\Center;
use Illuminate\Http\Request;

interface CenterRepositoriesInterface
{
    public function all();

    public function store(Request $request);

    public function update(Request $request, Center $center);
}