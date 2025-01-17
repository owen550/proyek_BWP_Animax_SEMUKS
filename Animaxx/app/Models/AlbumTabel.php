<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumTabel extends Model
{
    use HasFactory;

    protected $table = "album";
    protected $fillable = ['judulUtama','judulTambahan','statusTamat','releaseDate','studioID','deskripsi','imageAlbum','imageHorizontal'];
    public $timestamps = false;
}
