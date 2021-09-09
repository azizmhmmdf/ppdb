<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wawancara extends Model
{
    use HasFactory;
    protected $table = 'wawancaras';
    protected $guarded = ['created_at', 'updated_at'];

}
