<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table="schedules";

    protected $fillable=[
        'date','content'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }
}
