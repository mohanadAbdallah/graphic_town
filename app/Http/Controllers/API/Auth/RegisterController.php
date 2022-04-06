<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function response;

class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {
        if ($request->has('image') and $request->image != null) {
            $imageName = $request->image->store('public/user');
        }
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6',
            'image'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'account_type'=>'required',
        ]);



        $Appuser = AppUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'image'=>$imageName,
            'address'=> $validatedData['address'],
            'password' => Hash::make($validatedData['password']),
            'mobile' => $validatedData['mobile'],
            'account_type' => $validatedData['account_type'],

        ]);
        $token = $Appuser->createToken('auth_token')->plainTextToken;


        return response()->json([
            'Appuser'=>$Appuser,
            'status' => true,
            'token'=>$token

        ]);
    }
}
