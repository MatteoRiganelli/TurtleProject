<?php

namespace App\Http\Controllers;

use App\Model\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RatingController extends Controller
{
    //
    /**
     * assa
     **/
    public function insertRating(Request $request) {


        $validator = Validator::make($request->all(), [
            'mountain_id' => 'integer|required',
            'user_id' => 'integer|required',
            'rating' => 'integer|min:1|max:5'
        ]);

        if(!$validator->fails()){

            $rating = new Rating();
            $rating->title = $request->title;
            $rating->description = $request->description;
            $rating->user_id = $request->user_id;
            $rating->mountain_id = $request->mountain_id;
            $rating->rating = $request->rating;

            $rating->save();
            return response([
               'data' => 'rating added!'
        ], 200);
        }
        else
            return response([
                'data' => 'wrong value'
            ], 403);

    }



}
