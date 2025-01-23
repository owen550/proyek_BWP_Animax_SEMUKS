<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTabel extends Authenticatable
{
    use HasFactory;
    
    protected $connection = "animaxx";
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = ['email','nama','username','password','imageURL','member','status'];
    public $timestamps = false;
    public $incrementing = true;
    protected $authPasswordName = 'password';
    protected $appends = ["member_text"];

    public function getMemberTextAttribute() {
        if($this->member == 0) {
            return 'user';
        } else {
            return 'admin';
        }
    }

    

}

