<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelVidio extends Model
{
    use HasFactory;

    protected $table = 'vidio';
    protected $fillable = ['judul','relaseDate','vidioURL','album','tipe'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
