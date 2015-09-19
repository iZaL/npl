<?php

namespace App\Src\User;

use App\Core\LocaleTrait;
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

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, LocaleTrait;

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

    protected $localeStrings = ['firstname', 'lastname', 'city', 'address', 'country'];

    public function levels()
    {
        return $this->belongsToMany(Level::class, 'user_levels');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'user_subjects');
    }

    public function activeSubjects()
    {
        return $this->subjects()->wherePivot('active', 1);
    }

    public function inActiveSubjects()
    {
        return $this->subjects()->wherePivot('active', 0);
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

    /**
     * Determine whether the user can answer the question
     * @param Question $question
     * @return $this
     * @throws \Exception
     */
    public function canAnswer(Question $question)
    {
        if (!is_a($this->getType(), Educator::class)) {
            throw new \Exception('Your cannot answer this question. Not an educator');
        }

        $userSubjects = $this->activeSubjects->modelKeys();
        $userLevels = $this->levels->modelKeys();

        if (!in_array($question->subject_id, $userSubjects)) {
            throw new \Exception('Your cannot answer this question. Subject not in ur list');
        }

        if (!in_array($question->level_id, $userLevels)) {
            throw new \Exception('Your cannot answer this question. Level not in ur list');
        }

        return $this;

    }

}
