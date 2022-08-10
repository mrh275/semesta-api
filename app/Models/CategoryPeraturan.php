<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPeraturan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function peraturan()
    {
        return $this->hasMany(ListPeraturan::class, 'category_peraturan_id', 'id');
    }
}
