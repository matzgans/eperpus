<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Buku, Pinjam};
use Illuminate\Support\Carbon;

class PinjamController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $pinjam = Pinjam::all();
        return view('pinjams.index', compact('buku', 'pinjam'));
    }
    
    public function auto($id = 0)
    {
        $data = Buku::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $a = Buku::find($request->judul);
        $b = $a->stok - $request->jum_peminjaman;
        
        $a->update([
            'stok'=>$b,
        ]);

        Pinjam::create([
            'jum_peminjaman'=>$request->jum_peminjaman,
            'buku_id'=>$request->judul,
            'denda'=> 0,
            'tanggal_peminjaman'=>$request->tanggal_peminjaman,
            'tanggal_pengembalian'=> NULL,
        ]);
        return redirect()->back();
    }

    public function kembali($id)
    {
        $data = Pinjam::find($id);
        
        $data->update([
            'tanggal_pengembalian' => Carbon::now(),
        ]);
        $t = date_create($data->tanggal_peminjaman);
        $r = date_create($data->tanggal_pengembalian);
        $c = date_diff($t, $r);
        if($c->d >= 4){
            $data->update([
                'denda'=> 3000,
            ]);
            return redirect()->back();
        }
        return redirect()->back();
    }
}
