<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_manager extends Model
{

    use HasFactory;
    protected $table = 'task_managers';
    protected $primaryKey = 'id';
    protected  $fillable = ['task_name', 'date', 'reminder', 'deleted_status'];

}
