<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dashboard;
use App\Models\User;
use App\Models\sql;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('accessAdmin', User::class);
        $sensor = user::orderBy('name', 'desc')->get();


        return view('profil',compact('sensor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('accessAdmin', User::class);
        $sensor = user::orderBy('name', 'desc')->get();

        $uniqueUsers = DB::table('sensors')->distinct()->pluck('id_user');



        return view('createuser',compact('sensor','uniqueUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // dd($request);
        $sensor                     = new User;
        $sensor->name               = $request->get('name');
        $sensor->email               = '';
        $sensor->password            =$request->get('password');
        $sensor->level              = $request->get('level');
        $sensor->id_user            = $request->get('id_user');
        $sensor->save();
        

        return redirect()->route('user.index',compact('sensor'))->with(['success' => 'Data Berhasil Di Update']);
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
        $data = User::where('id', $id)->first();
        $data->delete();
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}
