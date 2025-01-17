<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTabel extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['email','nama','username','password','imageURL','member','status'];
    public $timestamps = false; 

}
