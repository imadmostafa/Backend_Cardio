<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_record extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date_of_birth',
        'start_date',
        'end_date',
        'device_id'
     ];

     public function device(){
        return $this->belongsTo(Device::class,'device_id','id');
    }

    public function event_records(){
        return $this->hasMany(Event_record::class,'patient_record_id','id');
    }
}
