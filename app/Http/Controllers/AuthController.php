<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        if ($user == null){
            return redirect()->back()->with("error", "Email not found");
        }

        if (!Hash::check($request->password, $user->password)){
            return redirect()->back()->with("error", "Wrong password");
        }

        $request->session()->regenerate();
        $request->session()->put("isLogged", true);
        $request->session()->put("id", $user->id);
        $request->session()->put("name", $user->name);
        $request->session()->put("email", $user->email);
        $request->session()->put("phone", $user->phone);
        $request->session()->put("role_id", $user->role_id);

        return redirect()->route("homepage");
    }

    public function signupPage()
    {
        return view("signup");
    }

    public function signup(Request $request)
    {
        $payload = $request->all();
        $isEmailTaken = User::where("email", $payload["email"])->first();

        if ($isEmailTaken){
            return redirect()->back()->with("error", "Email already taken");
        }

        $newUser = [
            "name" => $payload["name"],
            "email" => $payload["email"],
            "password" => Hash::make($payload["password"]),
            "phone" => $payload["phone"],
            "role_id" => 2
        ];

        User::create($newUser);

        $user = User::where("email", $payload['email'])->first();

        $request->session()->regenerate();
        $request->session()->put("isLogged", true);
        $request->session()->put("id", $user->id);
        $request->session()->put("name", $user->name);
        $request->session()->put("email", $user->email);
        $request->session()->put("phone", $user->phone);
        $request->session()->put("role_id", $user->role_id);

        return redirect()->route("homepage");
    }

    public function logout(Request $request)
    {
        session()->flush();

        return redirect()->route("login-page");
    }
}
