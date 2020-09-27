<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    use HasFactory;

    /**
     * The corresponding SQL table (without an 's' at the end to
     * faciliate the student <-> task relationship)
     */
    protected $table = 'task_user';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_id',
        'user_id', // the student's id
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'assignment_date' => 'datetime',
        'finished_date' => 'datetime', // NULL if not finished yet
    ];
}
