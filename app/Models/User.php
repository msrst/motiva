<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'role_id',
        'teacher_id', // null=teacher, not null = user id of the corresponding teacher
        'points',
        'hair_id',
        'face_id',
        'body_id',
        'legs_id',
        'accessory_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'is_teacher',
    ];

    /**
     * Returns whether this user is a teacher.
     */
    public function getIsTeacherAttribute($value)
    {
        return($this->teacher_id == NULL);
    }

    /**
     * Get the tasks created by this teacher.
     */
    public function teacher_tasks()
    {
        // uses the user_id foreign key of the tasks table
        return $this->hasMany('App\Models\Task', 'user');
    }

    /**
     * Get the tasks assigned to this student.
     */
    public function student_tasks()
    {
        // uses the task_user table
        return $this->belongsToMany('App\Models\Task');
    }

    /**
     * Get all avatar items owned by this student.
     */
    public function student_items()
    {
        return $this->belongsToMany('App\Models\Item');
    }
}
