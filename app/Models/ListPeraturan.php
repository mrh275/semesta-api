<?php

namespace App\Models;

use App\Models\CategoryPeraturan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListPeraturan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categoryPeraturan()
    {
        return $this->belongsTo(CategoryPeraturan::class, 'category_peraturan_id', 'id');
    }
}
