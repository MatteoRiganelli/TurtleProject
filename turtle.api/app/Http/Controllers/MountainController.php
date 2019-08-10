<?php

namespace App\Http\Controllers;

use App\Model;
use App\Mountain;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Notifications\SignupActivate;
use Illuminate\Support\Facades\DB;



class MountainController extends Controller
{


    /**
     * Insert new Mountain into DB
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'altitude' => 'required ',
            'status' => 'boolean',
            'description' => 'text'
        ]);

        try {

            $mountain = new Mountain();
            $mountain->name = $request->name;
            $mountain->user_id = Auth::user()->id;
            $mountain->latitude = $request->latitude;
            $mountain->longitude = $request->longitude;
            $mountain->altitude = $request->altitude;
            $mountain->status = 1;

            $mountain->save();
        }
        catch(Exception $e)
        {
            return response()->json([
                'result' => 'failed',
            ]);
        }

        return response()->json([
            'result' => 'success',
            'saved_at' => Carbon::now()->toDateTimeString()
        ]);

    }

    public function getAll() {
        return Mountain::all();
    }



}