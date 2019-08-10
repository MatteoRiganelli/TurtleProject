<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UtilityController extends Controller
{
    //
    /**
     * assa
     **/
    public function foundDatefromDate(Request $request) {

        $validator = Validator::make($request->all(),[
            'date' => 'required',
            'days' => 'required'
        ]);


        if(!$validator->fails()){
            $date = Carbon::parse($request->input('date'))->toDateString();
            $days = $request->input('days');
            return response([
               'data' => $this->addDayswithdate($date, $days)
        ], 200);
        }
        else
            return response([
                'data' => 'wrong value'
            ], 403);

    }

    function addDayswithdate($date,$days) {
        $date = strtotime("+".$days." days", strtotime($date));
        return  date("Y-m-d", $date);

    }


}
