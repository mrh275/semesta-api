<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\ListPeraturan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarPelanggaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function peraturan()
    {
        return $this->belongsTo(ListPeraturan::class, 'peraturan_id', 'id');
    }

    public function category_peraturan()
    {
        return $this->belongsTo(CategoryPeraturan::class, 'category_peraturan_id', 'id');
    }
}
