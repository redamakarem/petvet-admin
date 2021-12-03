<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthAuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'phone' => 'required',
            'vet_proffesion_id' => 'nullable'
        ]);


        if($request->get('isVet')==1){
            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'phone' => $fields['phone'],
                'password' => bcrypt($fields['password'])
            ]);
            $user->roles()->sync([3]);

            if($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $user->addMediaFromRequest('avatar')->toMediaCollection('user_avatar');
            }
            else{
                return \response('image error')->setStatusCode(401);
            }
            if($request->get('vet_proffesion_id')!=0){
                $user->vet_proffesion_id= $request->get('vet_proffesion_id');
                $user->save();
            }
            if($request->hasFile('certification') && $request->file('certification')->isValid()) {
                $user->addMediaFromRequest('certification')->toMediaCollection('user_certifications');
            }
            else{
                return \response('certification error')->setStatusCode(401,);
            }
        }
        else{
            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'phone' => $fields['phone'],
                'password' => bcrypt($fields['password'])
            ]);
            $user->roles()->sync([2]);
        }








        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::with(['roles'])->
        where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
