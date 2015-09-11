<?php

namespace App\Src\User;

use App\Src\Answer\Answer;
use App\Src\Educator\Educator;
use App\Src\Level\Level;
use App\Src\Question\Question;
use App\Src\Student\Student;
use App\Src\Subject\Subject;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Support\Facades\Hash;


class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

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

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

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

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function parentAnswers()
    {
        return $this->hasMany(Answer::class)->where('parent_id',0);
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
