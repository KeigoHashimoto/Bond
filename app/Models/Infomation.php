<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BulletinBoard;
use App\Models\Opinion;
use App\Models\Infomation;

class Infomation extends Model
{
    use HasFactory;

    protected $table='infomations';

    protected $fillable=['title','info'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function readUsers(){
        return  $this->belongsToMany(User::class,'reads','info_id','user_id');
    }

}
