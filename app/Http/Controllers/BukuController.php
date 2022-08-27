<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::all();
        return view('bukus.index', compact('data'));
    }

    public function store(Request $request)
    {
        Buku::create([
            'judul'=>$request->judul,
            'pengarang'=>$request->pengarang,
            'jum_halaman'=>$request->jum_halaman,
            'stok'=>$request->stok,
        ]);
        return redirect()->back();
    }
}
