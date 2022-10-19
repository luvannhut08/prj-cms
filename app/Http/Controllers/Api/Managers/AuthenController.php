<?php

namespace App\Http\Controllers\Api\Managers;

use App\Http\Requests\Manager\Auth\LoginRequest;
use App\Models\Api\Manager\Manager;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function login(LoginRequest $request) {
        $manager = Manager::where('email', $request['email'])->first();
        if (!$manager || !Hash::check($request['password'], $manager->password)) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Unauthorized'
            ]);
        }
        $token = $manager->createToken('tokenManager')->plainTextToken;
        if ($token) {
            $manager->api_token = $token;
            $manager->save();
        }
        return response()->json([
            'status_code' => 200,
            'message' => 'login success',
            'token' => $token,
            'role' => $manager->role,
        ]);
    }

    public function getInfo() {
        $manager = Auth::user();
        return response()->json([
            'status_code' => 200,
            'manager' => $manager,
        ]);
    }

    public function logout() {
        $manager = Auth::user();
        $manager->tokens()->delete();
    }
}
