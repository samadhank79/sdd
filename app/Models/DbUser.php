<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DbUser extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','password','role','designation','status'];
}
