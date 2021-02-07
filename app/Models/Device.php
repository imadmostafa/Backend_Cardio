<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
       'serialnumber'
    ];

    public function patient_records(){
        return $this->hasMany(Patient_record::class,'device_id','id');
    }
}
