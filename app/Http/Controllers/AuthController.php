<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Services\UsersVuejsService;
use App\Models\UsersVuejs;

class AuthController extends Controller
{

    private $userService;

    public function __construct(UsersVuejsService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $this->userService->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return "Ok";
        } else {
            return "Not Ok";
        }




        // $credentials = request(['email', 'password']);


        // $check = UsersVuejs::where('email', $request->email)->first();
        // $checkAu = Auth::attempt($credentials);

        // if (!Auth::attempt($credentials)) {
        //     return response()->json([
        //         'message' => 'Unauthorized',
        //         'checkAu' => $checkAu,
        //         'check' => $check,
        //     ], 401);
        // }
        // $userVue = $request->userVue();
        // $tokenResult = $userVue->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        // $token->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => "Success",
        //     'user' => $userVue
        // ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function userVue(Request $request)
    {
        return response()->json($request->userVue());
    }
}
