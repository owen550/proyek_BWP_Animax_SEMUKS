<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Membership extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'member'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
