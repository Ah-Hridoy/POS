<?php
namespace App\Helper;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken{
    public static function CreateToken($userEmail, $userId){
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel_token',
            'iat' => time(),
            'exp' => time() + 60 * 24 * 30,
            'userEmail'=> $userEmail,
            'userId'=> $userId
    ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function VerifyToken($token){
        try{
            if($token === null){
                return 'unauthorize';
            }else{
                $key = env('JWT_KEY');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return $decoded; // Ensure a return value after decoding
            }
        }catch(Exception){
            return response()->json([
                'status' => 'fail',
                'message' => "Unauthorized"
            ]);                         
        }
    }

    public static function CreateTokenForSetPassword($userEmail){
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel_token',
            'iat' => time(),
            'exp' => time() + 60 * 24 * 30,
            'userEmail'=> $userEmail,
            'userId'=> '0'
    ];
        return JWT::encode($payload, $key, 'HS256');
    }

}


