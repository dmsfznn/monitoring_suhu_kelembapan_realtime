<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspController extends Controller
{
    public function sensor($humidity, $temperature)
    {
        $data = DB::table('suhu');
        $tgl = Carbon::now();

        $data->insert([
            'suhu' => $temperature,
            'kelembapan' => $humidity,
            'created_at' => $tgl,
            'updated_at' => $tgl
        ]);
        return event(new Esp ($temperature, $humidity));
    }
}
