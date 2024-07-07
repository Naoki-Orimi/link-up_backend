<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{    
    private $userModel;

    /**
     * コンストラクタでUserモデルのインスタンスを生成
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * 全ユーザー取得
     * 
     * [command]
     * curl http://localhost:8000/v1/user/users
     */
    public function getUsers() {
        $all_users = $this->userModel->all();

        return $all_users->isEmpty() 
            ? response()->json([], 204) 
            : response()->json($all_users);
    }

    /**
     * ユーザー取得
     * 
     * [command]
     * curl http://localhost:8000/v1/user/{id}
     */
    public function getUserId($id) {
        $target_user = $this->userModel->find($id);

        return is_null($target_user) 
            ? response()->json(['message' => 'User not found'], 404) 
            : response()->json($target_user);
    }
    
}
