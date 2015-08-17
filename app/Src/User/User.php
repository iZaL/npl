<?php

namespace App\Src\User;

use App\Src\Educator\Educator;
use App\Src\Level\Level;
use App\Src\Student\Student;
use App\Src\Subject\Subject;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function levels()
    {
        return $this->belongsToMany(Level::class, 'user_levels');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'user_subjects');
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function educator()
    {
        return $this->hasOne(Educator::class);
    }

    /**
     * Get USER TYPE
     * @return string
     */
    public function getType()
    {
        return $this->student ?: ($this->educator ?: $this);
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }
}
