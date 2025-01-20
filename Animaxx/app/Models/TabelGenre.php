<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelGenre extends Model
{
    use HasFactory;

    protected $table = 'genre';
    protected $fillable = ['genreName'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function albums(){
        return $this->belongsToMany(TabelAlbum::class,'genrelist','idAlbum','id');
    }
}
