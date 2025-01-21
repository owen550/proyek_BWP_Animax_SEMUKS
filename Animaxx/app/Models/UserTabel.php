<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTabel extends Authenticatable
{
    use HasFactory;

    protected $table = "users";
    protected $fillable = ['email','nama','username','password','imageURL','member','status'];
    public $timestamps = false;
    public $incrementing = true;

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
