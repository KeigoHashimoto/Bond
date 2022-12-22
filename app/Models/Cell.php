<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;

class Cell extends Model
{
    use HasFactory;

    protected $fillable=[
        'content1',
        'content2',
        'content3',
        'content4',
        'content5',];

    public function table(){
        return $this->belongsTo(Table::class);
    }    
}
