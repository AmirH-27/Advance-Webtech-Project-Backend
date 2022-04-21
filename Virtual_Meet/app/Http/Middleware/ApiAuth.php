<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\Accounts;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header("Authorization_token");
        $check_token = Token::where('token',$token)->where('expired_at',null)->first();
        $user_id = $check_token->user_id;
        $user = Accounts::where('id', $user_id)->where('verified', "verified")->first();
        if ($check_token) {
            return $next($request);
        }
        else return $token;
    }
}
