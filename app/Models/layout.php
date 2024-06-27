<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class layout extends Authenticatable
{
    use HasFactory;
    protected $table = "register";
    protected $fillable = ["Email", "password","check-password"];
}
