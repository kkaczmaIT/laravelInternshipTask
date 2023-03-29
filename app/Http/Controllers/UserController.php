<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // No options
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
       ]);

       $validatedData['password'] = Hash::make($validatedData['password']);
       User::create($validatedData);

       return redirect(route('users.create'))->with('success', 'Użytkownik został zarejestrowany prawidłowo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     *  Display login form
     */
    public function loginForm() {
        return view('users.login');
    }

    /**
     * Create user's data in session and check login data 
     */
    public function login(Request $request) {

            $validatedData = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt($validatedData)) {
                return redirect()->intended('clients')->with('success', 'Zalogowano pomyślnie');
            }

            return redirect('login')->with('error', 'Dane logowania są niepoprawne');
    }

    /**
     *  Clear session data and logout user
     */

     public function signOut() {
        Auth::logout();

        return redirect('login')->with('success', 'Wylogowano pomyślnie');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
