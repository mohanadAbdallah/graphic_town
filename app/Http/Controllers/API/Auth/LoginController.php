<?php

namespace App\Http\Controllers\API\Auth;
use App\Http\Controllers\Controller;
use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = AppUser::where('email', $request->email)->first();

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Graphic Town Registration token')->plainTextToken;
            return response()->json(['user' => $user, 'token'=> $token, 'status' => true], 200);
        }

        return response()->json(['message' => 'invalid username or password', 'status' => false], 422);
    }
}
