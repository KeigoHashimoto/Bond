<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use App\Models\BulletinBoard;
use App\Models\Opinion;
use App\Models\Infomation;
use App\Models\Office;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function boards(){
        return $this->hasMany(BulletinBoard::class);
    }

    public function opinions(){
        return $this->hasMany(Opinion::class);
    }

    public function schedules(){
        return $this->hasMany(Shedule::class);
    }

    public function infomations(){
        return $this->hasMany(Infomation::class);
    }

    //読んだもの
    public function reads(){
        return $this->belongsToMany(Infomation::class,'reads','user_id','info_id');
    }

    public function addReads($infoId){
        $exists=$this->is_already($infoId);
        
        if($exists){
            return false;
        }else{
            $this->reads()->attach($infoId);
            return true;
        }
    }

    public function is_already($infoId){
        return $this->reads()->where('info_id',$infoId)->exists();
    }

    public function affiliations(){
        return $this->belongsToMany(Office::class,'affiliations','user_id','office_id');
    }

    public function join($officeId){
        $exists=$this->is_joined($officeId);

        if($exists){
            return false;
        }else{
            $this->affiliations()->attach($officeId);
            return true;
        }
    }

    public function is_joined($officeId){
        return $this->affiliations()->where('office_id',$officeId)->exists();
    }
}
