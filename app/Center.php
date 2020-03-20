<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
class Center extends Model
{
    protected $fillable = [
        'name', 'address', 'phone','opening_date',
    ];
    public function Damage()
    {
        return $this->belongsTo('App\Damage');
    }
}