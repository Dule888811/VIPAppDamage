<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    protected $fillable = [
        'date', 'description', 'type_of_priority','status'
    ];

    public function Centers()
    {
        return $this->haseMany('App/Center');
    }
}