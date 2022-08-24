<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    function logout(Request $request)
    {
       try {
        $request->user()->currentAccessToken()->delete(); //invalidate current session or current token
        //$request->user()->Token()->delete();//log out from all the dvices
       return response()->json(['status'=>'true',
       'message'=>'logout successfully!']);
    } catch (\Exception $e) {
        return response()->json(['status'=>'false',
       'message'=>'logout unsuccessfully!']);
       }
    }
}
