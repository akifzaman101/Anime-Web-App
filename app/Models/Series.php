<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Episode;

class Series extends Model
{
    use HasFactory;
    protected $table='series_info';
    //protected $primarykey ='user_id'; //needed later
    //Protected $incrementing = false;
    //protected $keyType = 'string';
    //protected $connection='';//for working with multiple database.
    public $timestamps = false;

    public function episodes(){
        return $this->hasMany(Episode::class,'from_series');
    }
}
