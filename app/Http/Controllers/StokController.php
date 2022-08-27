<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class StokController extends Controller
{
    public function index()
    {
        $data = Buku::all();
        return view('stok.index', compact('data'));
    }

    public function lihat($id)
    {
        $data = Buku::find($id);
        return response()->json($data);
    }
}
