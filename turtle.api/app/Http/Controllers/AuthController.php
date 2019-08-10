<?php

namespace App\Http\Controllers;

use App\Mail\SignupActivate;
use App\Model\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {


        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'activation_token' => str_random(60)
        ]);
        $user->save();

        //TODO se non c'è connessione non invia la mails ma setta comunque active=1 !! correggere
        //$user->notify(new SignupActivate($user));

        Mail::to($user)->send(new SignupActivate($user));

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        $user->email_verified_at = Carbon::now();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        echo $user;
        echo "</br>";
        // return "<a href='http://localhost:8080'> Redirect to Login Page</a>";
        return '<a href='.env("APP_CLIENT_URL").'> Redirect to Login Page</a>';
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);
        $credentials['active'] = 1;
        $credentials['deleted_at'] = null;

        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Unauthorized'
            ], 422);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


    public function logoutWithEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $usr = User::where('email',$request->email)->firstOrFail();

        $revoked = $tokensToRevoke = DB::table('oauth_access_tokens')
            ->select('revoked', 'user_id as user')
            ->where('user_id', '=', $usr->id)
            ->update(['revoked' => true]);

        if ($revoked != 0){
            return response()->json([
                'result' => true,
                'message' => 'Successfully logged out'
            ]);
        }
        else
        {
            return response()->json([
                'result' => false,
                'message' => 'Nothing to logged out'
            ]);
        }

    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}