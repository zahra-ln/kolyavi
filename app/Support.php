<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{

    protected $fillable = ['helper'];
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
