<?php

use App\Src\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NotificationControllerTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testNotifiesStudentorEducatorOnNewReply()
    {
        // create a question
        // create an answer
        // create a reply from student and test whether educator is being notified
        // create a reply from educator and test whether student is being notified

        $level = factory(\App\Src\Level\Level::class,1)->create();
        $subject = factory(\App\Src\Subject\Subject::class,1)->create();

        $student = factory(User::class,1)->create(['email'=>uniqid(),'np_code'=>uniqid()]);
        $student->student()->create([]);
        $student->levels()->sync([$level->id]);

        $educator = factory(User::class,1)->create(['email'=>uniqid(),'np_code'=>uniqid()]);
        $educator->educator()->create([]);
        $educator->subjects()->sync([$subject->id]);

        $questionBody = 'How much is 1+1 ? '.uniqid();
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => $subject->id, 'body_en' => $questionBody, 'level_id' => $level->id]);

        $answerBody = 'asdasdasd '.uniqid();
        $answer = factory('App\Src\Answer\Answer',
            1)->create(['user_id' => $educator->id,  'body_en' => $answerBody, 'user_id'=>$educator->id]);


        // notify educator when student replies
        $reply1 = uniqid();
        $this->actingAs($student)->call('POST', '/question/reply/',
            [
                'body_en' => $reply1,
                'question_id' =>$question->id,
                'answer_id' =>$answer->id
            ]
        );
        $this->seeInDatabase('notifications',['user_id'=>$educator->id,'read'=>0,'notifiable_id'=>$answer->id,'notifiable_type'=>'Answer']);

        $reply2 = uniqid();

        // notify studen when educator replies
        $this->actingAs($educator)->call('POST', '/question/reply/',
            [
                'body_en' => $reply2,
                'question_id' =>$question->id,
                'answer_id' =>$answer->id
            ]
        );
        $this->seeInDatabase('notifications',['user_id'=>$student->id,'read'=>0,'notifiable_id'=>$answer->id,'notifiable_type'=>'Answer']);

    }

    public function testNotifiesStudentOnNewAnswer()
    {
        $user = factory(User::class,1)->create(['email'=>uniqid(),'np_code'=>uniqid()]);

        $unReadNotifications = factory('App\Src\Notification\Notification',
            3)->create(['user_id' => $user->id, 'notifiable_id'=>1, 'notifiable_type'=>'Question', 'read'=> 0]);

        $readNotifications = factory('App\Src\Notification\Notification',
            1)->create(['user_id' => $user->id, 'notifiable_id'=>1, 'notifiable_type'=>'Question', 'read'=> 1]);

        $this->actingAs($user)
            ->visit('/student/questions')
            ->see('3 <i class="fa fa-bell"></i>');
    }

}