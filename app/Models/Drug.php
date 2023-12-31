<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'stok',
        'min_stok',
        'harga'
    ];


}
