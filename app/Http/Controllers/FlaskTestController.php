<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlaskTestController extends Controller
{
    public function accessTestEndpoint()
    {
        // Mengirim permintaan GET ke server Flask
        $response = Http::get('http://127.0.0.1:5000/test');

        // Memeriksa apakah permintaan berhasil
        if ($response->successful()) {
            // Mengembalikan respon dari Flask sebagai view
            return response($response->body());
        }

        return response()->json(['message' => 'Request failed'], 500);
    }
    public function showDashboard(Request $request)
    {
        $status = $request->query('status');
        $name = $request->query('name');

        return view('test', compact('status', 'name'));
    }
}
