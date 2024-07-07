<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth0\SDK\Auth0;

class AuthController extends Controller
{
    public function handleCallback(Request $request)
    {
        $auth0 = new Auth0([
            'domain' => env('AUTH0_DOMAIN'),
            'client_id' => env('AUTH0_CLIENT_ID'),
            'client_secret' => env('AUTH0_CLIENT_SECRET'),
            'redirect_uri' => env('AUTH0_REDIRECT_URI'),
            'audience' => env('AUTH0_AUDIENCE'),
            'persist_id_token' => true,
            'persist_access_token' => true,
            'persist_refresh_token' => true,
        ]);

        $userInfo = $auth0->getUser();

        if (!$userInfo) {
            // return redirect('http://localhost:3000/login');
            return response()->json(['message' => 'user is not allowed'], 500);
        }

        // ユーザー情報を処理する（必要に応じてユーザーを作成/更新）
        // $user = User::firstOrCreate([...]);

        // 認証が完了した後にフロントエンドにリダイレクト
        return response()->json([], 200);
    }
}
