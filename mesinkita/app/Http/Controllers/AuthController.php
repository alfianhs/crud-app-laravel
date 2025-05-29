<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pian-app.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pian-app.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            
        ]);
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if (Auth::attempt($data)) {
            // Sukses login
            return redirect('/home');
            } else {
            // Gagal login
            Session()->flash('error','Email atau password salah');
            return back();
            }
    }

    /**
     * Display the specified resource.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect ('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('pian-app.login');
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
}
