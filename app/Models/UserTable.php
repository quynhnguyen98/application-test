<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['user_name', 'password', 'full_name', 'created_at', 'update_at']; 
}