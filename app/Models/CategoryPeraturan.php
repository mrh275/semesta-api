<?php

namespace App\Models;

use App\Models\ListPeraturan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryPeraturan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function peraturan()
    {
        return $this->hasMany(ListPeraturan::class, 'category_peraturan_id', 'id');
    }
}
