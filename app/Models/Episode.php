<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Series;


class Episode extends Model
{
    use HasFactory;
    protected $table='episode_info';
    public $timeStamps = false;
    
    
    
    public function series(){
        return $this->belongsTo(Series::class,'from_series');
    }
}
