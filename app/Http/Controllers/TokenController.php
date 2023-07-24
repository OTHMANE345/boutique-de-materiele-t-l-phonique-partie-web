<?php


namespace App\Http\Controllers;
use Illuminate\Auth\AuthenticationException;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class TokenController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !$user->checkPassword($request->password)) {
            throw new AuthenticationException('Invalid credentials');
        }



        return [
            'token' => $user->createToken('email')->plainTextToken,
            'user' => $user,
            'success' => true
        ];
    }

    public function destroy(Request $request)
    {
        $request->user()->tokens()->delete();


    }

    public function addUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return [
            "success"=> true
        ];
    }
}
