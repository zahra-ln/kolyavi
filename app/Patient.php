<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name', 'fathers_name','national_code','doctor','sickness_type', 'insurance_type','insurance','date_transplant','transplant_hospital','transplant_doctor','drug', 'home_adres','work_adres','home_phone','work_phone','cellphone','required_phone', 'account_number'];

    public function supports()
    {
    return $this->hasMany('App\Support');
    }


    public function letters()
    {
        return $this->hasMany('App\Letter');
    }

}
