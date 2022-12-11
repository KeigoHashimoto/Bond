<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Office;

class Table extends Model
{
    use HasFactory;

    protected $fillable=['title','discription','head1','head2','head3','head4','head5'];
    
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
