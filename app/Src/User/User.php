<?php

namespace App\Src\User;

use App\Core\LocaleTrait;
use App\Src\Answer\Answer;
use App\Src\Educator\Educator;
use App\Src\Level\Level;
use App\Src\Notification\Notification;
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

    protected $table = 'users';
    protected $guarded = ['id'];
    protected $hidden = ['password', 'remember_token'];
    protected $localeStrings = ['firstname', 'lastname', 'city', 'address', 'country'];
    protected $softDeletes = true;

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

    /**
     * Determine whether the user can answer the question
     * @param Question $question
     * @return $this
     * @throws \Exception
     */
    public function canAnswer(Question $question)
    {
        if (!is_a($this->getType(), Educator::class)) {
            throw new \Exception('You cannot answer this question. Not an educator');
        }

        $userSubjects = $this->activeSubjects->modelKeys();
        $userLevels = $this->levels->modelKeys();

        if (!in_array($question->subject_id, $userSubjects)) {
            throw new \Exception('You cannot answer this question. Subject either not in ur list or not approved by admin');
        }

        if (!in_array($question->level_id, $userLevels)) {
            throw new \Exception('You cannot answer this question. Level not in ur list');
        }

        return $this;

    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin ? ( $this->active ? true: false ) : false;
    }

    public function isEducator()
    {
        return session()->has('userType') ? (session()->get('userType') ==  'Educator' ? true: false ) :false;
    }

    public function isStudent()
    {
        return session()->has('userType') ? (session()->get('userType') ==  'Student' ? true: false ) :false;
    }


    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function unreadNotifications()
    {
        return $this->notifications()->where('read',0);
    }

    public function unreadNotificationsCount()
    {
        return $this->hasOne(Notification::class,'user_id')
            ->selectRaw('user_id, count(*) as aggregate')
            ->where('read',0)
            ->groupBy('user_id')
            ;
    }

    public function getUnreadNotificationsCountAttribute()
    {
        // if relation is not loaded already, let's do it first
        if (!$this->relationLoaded('unreadNotificationsCount')) {
            $this->load('unreadNotificationsCount');
        }

        $related = $this->getRelation('unreadNotificationsCount');

        // then return the count directly
        return ($related) ? (int)$related->aggregate : 0;
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function parentAnswers()
    {
        return $this->hasMany(Answer::class)->where('parent_id', 0);
    }


}
