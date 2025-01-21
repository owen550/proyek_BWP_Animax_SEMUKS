<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelLikelist extends Model
{
    use HasFactory;

    protected $table = 'likelist';
    protected $fillable = ['idUser','idVidio','status'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
