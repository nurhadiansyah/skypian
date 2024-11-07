<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\dashboard;
use App\Models\sql;
use Carbon\Carbon;

class TransferMongoToMysql extends Command
{
    protected $signature = 'transfer:mongo-to-mysql';
    protected $description = 'Transfer data from MongoDB to MySQL';

    public function handle()
    {
        // Ambil data dari MongoDB
    $dataMongo = dashboard::all();

    foreach ($dataMongo as $data) {
        // Konversi format tanggal
        $formattedDate = \Carbon\Carbon::createFromFormat('d/m/Y', $data->date)->format('Y-m-d');

        // Cek apakah data sudah ada di MySQL
        $existingData = sql::where('_id', $data->_id)
            ->where('date', $formattedDate)
            ->first();

        if (!$existingData) {
            // Jika tidak ada, buat data baru
            sql::create([
                '_id'=> $data->_id,
                'id_user' => $data->id_user,
                'date' => $formattedDate,
                'time' => $data->time,
                'ph' => $data->ph,
                'tds' => $data->tds,
                'water_temp' => $data->water_temp,
                'air_temp' => $data->air_temp,
                'humidity' => $data->humidity,
                'heat_index' => $data->heat_index
            ]);
        }
        // Jika data sudah ada, Anda dapat melakukan tindakan lain jika perlu (misalnya, mencetak pesan)
    }

    $this->info('Data berhasil ditransfer tanpa menimpa data yang ada!');
    }
}
