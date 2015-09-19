<?php namespace App\Src\Answer;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Question\Question;
use App\Src\User\User;

class Answer extends BaseModel
{

    use LocaleTrait;

    protected $table = 'answers';

    protected $guarded = ['id'];

    protected $localeStrings = ['body'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function childAnswers()
    {
        return $this->hasMany(Answer::class, 'parent_id');
    }

    public function childAnswersCount()
    {
        return $this->hasOne(Answer::class,'parent_id')
            ->selectRaw('parent_id, count(*) as aggregate')
            ->groupBy('parent_id');
    }

    public function getChildAnswersCountAttribute()
    {
        // if relation is not loaded already, let's do it first
        if (!$this->relationLoaded('childAnswersCount')) {
            $this->load('childAnswersCount');
        }

        $related = $this->getRelation('childAnswersCount');

        // then return the count directly
        return ($related) ? (int)$related->aggregate : 0;
    }

    public function parentAnswers()
    {
        return $this->hasMany(Answer::class, 'id')->where('parent_id', 0);
    }
}
