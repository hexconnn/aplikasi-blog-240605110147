<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Penulis;
use App\Models\KategoriArtikel;

class Artikel extends Model
{
    protected $table = 'artikel';

    public $timestamps = false;

    protected $fillable = [
        'id_penulis',
        'id_kategori',
        'judul',
        'isi',
        'gambar',
        'hari_tanggal',
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori');
    }
}