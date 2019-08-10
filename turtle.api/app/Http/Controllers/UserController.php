<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Model\Token;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function getUserList()
    {
        $data =  User::orderBy('name', 'asc')->get();

        return response(['data' => $data], 200);
    }

    /**
     * Handling the forgot password email request
     **/
    public function forgotPassword(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user)
        {
            return response(['data' => 'Check if the email is correct'], 403);
        }

        $token = Token::create([
            'user_id' => $user->id,
            'token' => uniqid(),
            'expired_at' => Carbon::now()->addHour()
        ]);

        Mail::to($user)->send(new ForgotPassword($token, $request));

        return response(['data' => 'Email sent.'], 200);
    }

    /**
     * Handling the reset password email request
     **/
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()){
            return response([
                'data' => $validator->errors()
            ], 433);
        }

        $token = $request->input('token');

        $dbToken = DB::table('tokens')
            ->where('token', $token)
            ->where('expired_at', '>', Carbon::now())
            ->first();

        if (!$dbToken) {
            return response(['data' => 'Wrong token'], 403);
        }

        $user = User::where('id', $dbToken->user_id)->first();

        $user->password = bcrypt($request->input('password'));

        $user->save();

        $deletedToken = DB::table('tokens')->where('id', $dbToken->id)->delete();

        return response(['data' => 'Password changed'], 200);
    }
}
