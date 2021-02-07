<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_record extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'date',
        'heartrate',
        'patient_record_id',
     ];


     public function patient_record(){
        return $this->belongsTo(Patient_record::class,'patient_record_id','id');
    }

}
