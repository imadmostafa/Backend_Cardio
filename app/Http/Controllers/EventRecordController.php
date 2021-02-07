<?php

namespace App\Http\Controllers;

use App\Models\Patient_record;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class EventRecordController extends Controller
{
    //
    public function getAll_Events(Request $request){



        $patient_record_id = request('patient_record_id');

        if(($patient_record_id)){
            $patient=Patient_record::find($patient_record_id);
            $events=$patient->event_records()->get();
            return response()->json([
              'success' => true,
               'events'=>$events
          ]);
        }else{
            return response()->json([
                'success' => false,
                 'message'=>'patient id missing'
            ]);
        }
        /*if($validator->fails()){
            return response()->json([
                'success' => false,
                 'message'=>'patient id missing'
            ]);
        }*/



    }
}
