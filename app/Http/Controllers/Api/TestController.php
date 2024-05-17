<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getTestCode()
    {
        return response()->json([
            'message' => 'テストコードです',
            'number'  => 0
        ]);
    }
}
