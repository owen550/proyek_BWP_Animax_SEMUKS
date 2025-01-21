<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelKomentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';
    protected $fillable = ['idUser','idVidio','isiKomentar'];
    protected $primaryKey = 'id';
    protected $auto_increment = true;
    public $timestamps = true;
}
