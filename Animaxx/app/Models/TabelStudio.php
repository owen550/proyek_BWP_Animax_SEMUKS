<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelStudio extends Model
{
    use HasFactory;

    protected $table = 'studio';
    protected $fillable = ['idUser','idVidio','status' ];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function album(){
        return $this->hasMany(TabelStudio::class,'studioID','id');
    }
}
