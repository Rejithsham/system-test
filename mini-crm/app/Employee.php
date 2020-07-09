<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'companies_id', 'email','phone'
    ];
    
    public function company(){
        return $this->hasMany('App\Company');
    }
}
