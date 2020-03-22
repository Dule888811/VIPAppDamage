<?php


namespace App\Repositories;


use App\Damage;
use App\Mail\WarningMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DamageRepositories implements DamageRepositoriesInterface
{
    public function all()
    {
        $damages = Damage::all();
        return $damages;
    }

    public function store(Request $request)
    {
        $damage = new Damage();
        $damage->date = $request->damage_date;
        $damage->description = $request->damage_description;
        $damage->type_of_priority = $request->type_priority;
        $damage->status = $request->status;
        $damage->center_id = $request->center_damage;
        $damage->save();
        return $damage;
    }

    public function update(Request $request, Damage $damage)
    {
        $damage->date = $request->damage_date;
        $damage->description = $request->damage_description;
        $damage->type_of_priority = $request->type_priority;
        $damage->center_id = $request->center_damage;
        $damage->update();
    }
}