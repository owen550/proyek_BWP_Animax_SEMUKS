<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelAlbum extends Model
{
    use HasFactory;

    protected $table = 'album';
    protected $fillable = ['judulUtama','judulTambahan','statusTamat','releaseDate','studioID','deskripsi','imageAlbum','imageHorizontal'];
    protected $primaryKey = 'id';
    public $timestamps = true;


    public function studios(){
        return $this->belongsTo(TabelStudio::class,'studioID','id');
    }

    public function genres() {
        return $this->belongsToMany(TabelGenre::class, 'genrelist', 'idAlbum', 'idGenre');
        // model,nama tabel many to manynya, idlawan,id diri sendiri
    }
}
