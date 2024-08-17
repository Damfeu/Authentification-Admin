<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginAdminRequest;
use App\Mail\AccountMail;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view('auth.LoginAdmin');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(LoginAdminRequest $request)
    {
        $credentials = $request->validated();
    
        if (Auth::attempt($credentials)) {
           $request->session()->regenerate();
    
            // $user = Auth::user(); // Récupère l'utilisateur actuellement authentifié
            $user = User::where('email', $request->email)->first(); // Récupère l'utilisateur actuellement authentifié
    
            if ($user) {
                if ($user->role == true) {
                    return redirect()->route('auth.dashboard');
                }  

                return redirect()->route('userDashboard');
                
                // return redirect()->intended(route('auth.Dashboard'));
             } else {
                return back()->with('error', 'Absent');
            }
        }
    
        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.'
        ])->withInput($request->only('email'));
    }

    // public function login(LoginAdminRequest $request)
    // {

    //     $credentials = $request->only('email', 'password');

        
    //     try {
    //         if (Auth::attempt($credentials)) {
    //             return redirect()->route('auth.dashboard');

                
    //         } else {
    //             return back()->with('error', "Email or password incorrect.");
    //         }


    //     } catch (\Exception $ex) {
            
    //         return back()->with('error', 'An error occurred during processing. Please try again!');
    //     }
    //   }
    
    /**
     * Store a newly created resource in storage.
     */


    //  public function register(Request $request)
    //  {
    //      $request->validate([
    //          "name" => "required|string|max:255",
    //          "email" => "required|string|email|max:255|unique:users,email",
    //          "password" => "nullable|string|min:8|confirmed", // Mot de passe optionnel
    //      ]);

    //      $user = new User;
    //      $user->name = $request->name;
    //      $user->email = $request->email;

    //      if ($request->filled('password')) {

    //          $user->password = Hash::make($request->password);
    //      } else {
    //          // Si aucun mot de passe n'est fourni, définir un mot de passe par défaut ou le laisser vide.
    //          $user->password = Hash::make('default_password'); // Exemple de mot de passe par défaut
    //      }

    //      if ($user->save()) {
    //         Mail::to($request->email)->send(new AccountMail($request->password));
    //          return redirect()->route('auth.dashboard')->with("success", "User successfully registered");
    //      } else {
    //          return back()->with("error", "Registration failed!");
    //      }
    //  }


    public function register(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users,email",
            "password" => "nullable|string|min:4|confirmed", // Mot de passe optionnel
        ]);
        $authCode = rand(1000, 9999);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = false;
        $user->password = Hash::make($authCode);

        // if ($request->filled('password')) {
        //     $user->password = Hash::make($request->password);
        // } else {
        //     $user->password = Hash::make('default_password'); // Exemple de mot de passe par défaut
        // }

        // Générer un code d'authentification de 4 chiffres
        // $user->auth_code = $authCode;

        // Hacher le code avant de le sauvegarder
        // $user->auth_code = Hash::make($authCode);

        if ($user->save()) {
            // Envoyer le code par email
            Mail::to($request->email)->send(new AccountMail($authCode));
            return redirect()->route('auth.dashboard')->with("success", "User successfully registered. The authentication code has been sent by email.");
        } else {
            return back()->with("error", "Registration failed!");
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showDashboard()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('auth.dashboard', compact('users'));
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.LoginAdmin')->with('success', 'You have been logged out.');
    }
}



