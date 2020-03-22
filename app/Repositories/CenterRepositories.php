<?php


namespace App\Repositories;


use App\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CenterRepositories implements CenterRepositoriesInterface
{
    public function all()
    {

        $centers = DB::table('centers')->get();
        return $centers;
    }

    public function store(Request $request)
    {
        $center = new Center;
        $center->name = $request->center_name;
        $center->address = $request->center_address;
        if (isset($request->center_phone)) {
            $request->validate([
                'center_phone' => 'numeric',
            ]);
            $center->phone = $request->center_phone;
        }
        if (isset($request->center_opening_date)) {
            $request->validate([
                'center_opening_date' => 'date',
            ]);
            $center->opening_date = $request->center_opening_date;
        }
        $center->save();
    }

    public function update(Request $request, Center $center)
    {
        $center->name = $request->center_name;
        $center->address = $request->center_address;
        if (isset($request->center_phone)) {
            $center->phone = $request->center_phone;
        }
        if (isset($request->center_opening_date)) {
            $center->opening_date = $request->center_opening_date;
        }
        $center->update();
    }
}