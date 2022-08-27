<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Pinjam extends Model
{
    use HasFactory;
    Protected $table= 'pinjams';
    Protected $fillable = ['jum_peminjaman', 'buku_id', 'tanggal_peminjaman', 'tanggal_pengembalian', 'denda'];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
