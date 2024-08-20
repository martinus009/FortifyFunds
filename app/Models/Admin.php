<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Jika perlu, atur nama tabel
    protected $table = 'admins';

    // Jika perlu, atur atribut yang fillable atau guarded
    protected $guarded = ['id'];

    // Jika diperlukan, definisikan relasi atau metode lain di sini
}
