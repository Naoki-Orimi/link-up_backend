<?php

namespace App\Http\Middleware;

use Closure;
use Auth0\SDK\JWTVerifier;

class CheckJWT
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        try {
            $verifier = new JWTVerifier([
                'supported_algs' => ['RS256'],
                'valid_audiences' => [env('AUTH0_AUDIENCE')],
                'authorized_issuer' => [env('AUTH0_DOMAIN')],
                'client_secret' => env('AUTH0_CLIENT_SECRET'),
            ]);

            $decodedToken = $verifier->verifyAndDecode($token);
            $request->user = $decodedToken;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
