<?php

namespace App\Http\Controllers\API;
use App\Models\AppUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_profile(){

        $user= auth('sanctum')->user();


        return response()->json([
           'user'=>$user,
           'status'=>200
        ]);

    }
    public function update_profile(Request $request)
    {
        $validatedData=$request->validate([

            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            
            ]);

        $user=auth('sanctum')->user();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->mobile = $validatedData['mobile'];
        $user->address = $request->address;
        if ($request->has('image') and $request->image != null) {
            $imageName = $request->image->store('public/user');
            $user->image = $imageName;
        }
        $user->save();
        return response()->json(['user' => $user, 'status' => true], 200);

    }

   public function user_show($id){

        $user=AppUser::findOrFail($id);
        return response()->json([
           'user'=>$user,
           'status'=>200
        ]);
    }


}
