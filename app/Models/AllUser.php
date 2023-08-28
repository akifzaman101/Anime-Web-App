<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\CourseStudent;

class AllUser extends Model
{
    use HasFactory;
    protected $table='allusers';
    public $timestamps = false;

   
}
