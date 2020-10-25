<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //
    public function index()
    {
        // return view('api-tokens');
    }

    public function post(Request $request)
    {
        // dd($request);
    }

    public function api(Request $request)
    {
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);        
            // $token->save();        
            
            return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
    }
}
