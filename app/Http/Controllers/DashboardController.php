<?php

namespace App\Http\Controllers;

use App\Models\dashboard;
use App\Models\sql;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(config('database.connections'));       
        // kodingan awal yang benar 
        // $sensors = dashboard::orderBy('id_user', 'desc')->first();

        $id = auth::user()->id_user;


        $sensors = DB::table('sensors as s')
            ->leftJoin('users as u', 's.id_user', '=', 'u.id_user')
            ->where('u.id_user', $id)
            ->orderBy('s.id', 'desc') // Mengurutkan berdasarkan kolom waktu
            ->first(); // Mengambil data terbaru
        $data = sql::select('water_temp', 'air_temp', 'date', 'time','ph','humidity','heat_index','tds')
            ->where('id_user', $id)
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->orderBy('ph', 'asc')
            ->orderBy('humidity', 'asc')
            ->orderBy('heat_index', 'asc')
            ->orderBy('tds', 'asc')
            ->get();
        // $label = $data->pluck('date' . ' ' . 'time')->format('d/m/y H:i')->toArray();
        $label = $data->map(function ($data) {
             return Carbon::parse($data->date . ' ' . $data->time)->format('d/M/y H:m');
            })->toArray();  
        $waterTemp = $data->pluck('water_temp')->toArray(); // Data suhu air
        $airTemp = $data->pluck('air_temp')->toArray(); // Data suhu udara
        $dataph = $data->pluck('ph')->toArray(); // Data ph
        $datahumidity = $data->pluck('humidity')->toArray(); // Data humidity
        $dataheatindex = $data->pluck('heat_index')->toArray(); // Data heatindex
        $datatds = $data->pluck('tds')->toArray(); // Data heattds

        dd($sensors);
        // dd($label, $waterTemp, $airTemp);    
        // dd($waterTemp);  

        return view('dashboard', compact('sensors','data','label', 'waterTemp', 'airTemp','dataph','datahumidity','dataheatindex','datatds'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dashboard $dashboard)
    {
        //
    }
}
