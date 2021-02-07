<?php

namespace App\Http\Controllers;

use App\Models\Patient_record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientRecordController extends Controller
{

    public function getAll_Patients(){


    $query = "SELECT  pr.*, d.serialnumber,COUNT(er.type) as events_count
    FROM patient_records as pr
    LEFT JOIN event_records er on er.patient_record_id = pr.id
    INNER JOIN devices d on d.id=pr.device_id
    GROUP BY pr.id,pr.name,pr.date_of_birth,pr.start_time,pr.end_time,pr.device_id,pr.created_at,pr.updated_at,d.serialnumber
    ORDER BY events_count,pr.start_time ASC";
        $patients = DB::Select($query);
        if($patients){
            return response()->json([
                'success' => true,
                'patients' => $patients,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message'=>'Error in Data Query'
            ]);

        }





    }//end of







}
