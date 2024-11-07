<?php

namespace App\Http\Controllers;

use App\Models\sql;
use App\Http\Requests\StoresqlRequest;
use App\Http\Requests\UpdatesqlRequest;
use App\Models\dashboard;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SqlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('accessAdmin', User::class);
        $sensors = dashboard::orderBy('id_user', 'desc')->first();
        $id_user = sql::orderBy('id_user', 'desc')->first();
        $data = User::orderBy('name', 'desc')->get();

        $id = auth::user()->id_user;


        $waktu = sql::orderBy('_id', 'desc')->first();
        // dd($waktu);
        
        
    //     $data2 = sql::select('water_temp', 'air_temp', 'date', 'time')
    //     ->where('id_user', $id_user)
    //     ->orderBy('date', 'asc')
    //     ->orderBy('time', 'asc')
    //     ->get();

    //     // Menyusun data untuk ApexCharts
    //     $labels = $data->pluck('date')->toArray(); // Mengambil tanggal untuk label
    //     $waterTemp = $data->pluck('water_temp')->toArray(); // Data suhu air
    //     $airTemp = $data->pluck('air_temp')->toArray(); // Data suhu udara

    
       
    //     // dd($data2);
    //     return view('dashboardadmin',compact('sensors','data','data2','labels','waterTemp','airTemp'));

    // kodingan gpt

    
    // Ambil data untuk grafik
    $label = sql::pluck('date'); // Mengambil tanggal sebagai label x-axis
    $waterTemp = sql::pluck('water_temp');
    $airTemp = sql::pluck('air_temp');
    $dataph = sql::pluck('ph');
    $datahumidity = sql::pluck('humidity');
    $dataheatindex = sql::pluck('heat_index');
    $datatds = sql::pluck('tds');

    return view('dashboardadmin', compact('data', 'sensors', 'label', 'waterTemp', 'airTemp', 'dataph', 'datahumidity', 'dataheatindex', 'datatds','sensors','waktu'));

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
    public function store(StoresqlRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Ambil data berdasarkan id_user yang dipilih
        $sensors = sql::where('id_user', $id)->orderBy('id', 'desc')->first();
        
        // Pastikan data tidak kosong
        if (!$sensors) {
            return response()->json(['message' => 'Tidak ada data untuk user ini.'], 404);
        }
    
        // Ambil data untuk grafik
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
    
        // Render view partial dengan data yang diperbarui
        $view = view('partials.user_data', compact('sensors', 'label', 'waterTemp', 'airTemp', 'dataph', 'datahumidity', 'dataheatindex', 'datatds'))->render();
        return response()->json(['html' => $view]);

        // $data = sql::where('id_user', $id)->get();

        // // Pastikan data tidak kosong
        // if ($data->isEmpty()) {
        //     return response()->json(['message' => 'Tidak ada data untuk user ini.'], 404);
        // }

        // // Render view dengan data yang diambil
        // $view = view('partials.user_data', compact('data'))->render();
        // return response()->json(['html' => $view]);

        // $sensor = DB::table('sensors as s')
        //     ->leftJoin('users as u', 's.id_user', '=', 'u.id_user')
        //     ->where('u.id_user', $sql)
        //     ->orderBy('s.id', 'desc') // Mengurutkan berdasarkan kolom waktu
        //     ->first(); // Mengambil data terbaru
        

        //     return view('dashboard',compact('sensor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sql $sql)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesqlRequest $request, sql $sql)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sql $sql)
    {
        //
    }
}
