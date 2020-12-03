<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return route('clients.show',['client' => $this]);
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }
}
