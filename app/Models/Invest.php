<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['code', 'slug', 'name', 'image', 'category'];
}
