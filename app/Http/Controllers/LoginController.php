<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\redirectResponse;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->name == null || $request->password == null) {
            // Jika nama atau kata sandi tidak diisi
            return redirect()->back()->with(['login error' => 'Masukkan Email atau Password!']);
        } else {
            // Mencari pengguna dengan mencocokkan name dan password langsung (tanpa bcrypt)
            $user = DB::table('users')
                ->where('name', $request->name)
                ->where('password', $request->password) // Pencocokan password langsung
                ->first();
        
            if ($user) {
                // Autentikasi berhasil, login secara manual
                Auth::loginUsingId($user->id);
        
                // Cek level pengguna
                if ($user->level == 1) {
                    return redirect()->intended('/sql');
                } else {
                    return redirect()->intended('/dashboard');
                }
            } else {
                // Autentikasi gagal
                return back()->with('login error', 'Login failed');
            }
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
    
}
