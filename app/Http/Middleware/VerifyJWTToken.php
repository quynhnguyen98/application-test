<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth as JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class VerifyJWTToken extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $token = JWTAuth::parseToken();
            $user = JWTAuth::toUser($token);
        }catch (JWTException $e) {
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(["error_code" =>498, "mess"=>"Phiên làm việc đã hết. Vui lòng đăng nhập lại."]);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(["error_code" =>401, "mess"=>"Tài khoản của bạn đang đăng nhập ở thiết bị khác.Hệ thống đăng xuất thiết bị này!"]);
            }
            else {
                return response()->json(["error_code" => 499, "mess"=>"Chưa có token đăng nhập. Vui lòng kiểm tra lại"]);
            }
        }
        return $next($request);
    }
}
