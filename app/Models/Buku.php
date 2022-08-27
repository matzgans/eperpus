<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pinjam;

class Buku extends Model
{
    use HasFactory;
    Protected $table = 'bukus';
    Protected $fillable = ['judul', 'pengarang', 'jum_halaman', 'stok'];

    public function pinjams()
    {
        return $this->hasMany(Pinjam::class);
    }
}
