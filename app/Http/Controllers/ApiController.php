<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function index(Request $request)
    {

        $csrfToken = $request->header('X-CSRF-TOKEN');
        $csrfToken2 = csrf_token();

        // $passportToken = $request->bearerToken();
        $tokensAreSame = ($csrfToken === $csrfToken2);
        return response()->json([
            'message' => 'CSRF and Passport tokens are working!',
            'csrf_token_header' => $csrfToken,
            'csrf_token' => $csrfToken2,
            'tokens_are_same' => $tokensAreSame
        ]);
        // dd($request);
        // // dd(csrf_token());
        // return response()->json(['message' => 'CSRF and Passport tokens are working!']);
    }
    // public function register(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     // Create a new user
    //     $user = User::create([
    //         'name' => $validated['name'],
    //         'email' => $validated['email'],
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     // Return a response with the created user data
    //     return response()->json([
    //         'message' => 'User registered successfully',
    //         'user' => $user
    //     ], 201);
    // }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'token' => $user->createToken('Personal Access Token')->plainTextToken
            ]);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // public function user(Request $request)
    // {
    //     return response()->json($request->user());
    // }

    // public function form()
    // {
    //     return view('form');
    // }

}
