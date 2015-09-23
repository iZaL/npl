<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    private $tables = [
        'users',
        'password_resets',
        'categories',
        'blogs',
        'photos',
        'subjects',
        'levels',
        'user_levels',
        'user_subjects',
        'students',
        'educators',
        'questions',
        'answers'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncateDatabaseTables();

        // 2,4= Educator
        // 3,5= Student

        factory('App\Src\User\User', 1)->create();
        factory('App\Src\User\User', 1)->create(['email' => 'educator@test.com', 'np_code' => 'NP2122']);
        factory('App\Src\User\User', 1)->create(['email' => 'student@test.com', 'np_code' => 'NP2123']);
        factory('App\Src\User\User', 1)->create(['email' => 'educator1@test.com', 'np_code' => 'NP2125']);
        factory('App\Src\User\User', 1)->create(['email' => 'student1@test.com', 'np_code' => 'NP2126']);

        factory('App\Src\Educator\Educator', 1)->create(['user_id' => 2]);
        factory('App\Src\Educator\Educator', 1)->create(['user_id' => 4]);

        factory('App\Src\Student\Student', 1)->create(['user_id' => 3]);
        factory('App\Src\Student\Student', 1)->create(['user_id' => 5]);

        factory('App\Src\Subject\Subject', 1)->create(['name_ar' => 'physics', 'name_en' => 'physics', 'icon'=>'flaticon-science65']);
        factory('App\Src\Subject\Subject', 1)->create(['name_ar' => 'chemistry', 'name_en' => 'chemistry','icon'=>'flaticon-science62']);
        factory('App\Src\Subject\Subject', 1)->create(['name_ar' => 'math', 'name_en' => 'math','icon'=>'flaticon-calculating12']);
        factory('App\Src\Subject\Subject', 1)->create(['name_ar' => 'english', 'name_en' => 'english','icon'=>'flaticon-abecedary2']);
        factory('App\Src\Subject\Subject', 1)->create(['name_ar' => 'french', 'name_en' => 'french','icon'=>'flaticon-monument33']);
        factory('App\Src\Subject\Subject', 1)->create(['name_ar' => 'arabic', 'name_en' => 'arabic','icon'=>'flaticon-islam55']);

        factory('App\Src\Level\Level', 1)->create(['name_ar' => 'university', 'name_en' => 'university']);
        factory('App\Src\Level\Level', 1)->create(['name_ar' => 'medium', 'name_en' => 'medium']);
        factory('App\Src\Level\Level', 1)->create(['name_ar' => 'elementary', 'name_en' => 'elementary']);
        factory('App\Src\Level\Level', 1)->create(['name_ar' => 'high school', 'name_en' => 'high school']);

        factory('App\Src\Level\UserLevel', 1)->create(['user_id' => 1, 'level_id' => 1]);
        factory('App\Src\Level\UserLevel', 1)->create(['user_id' => 2, 'level_id' => 2]);
        factory('App\Src\Level\UserLevel', 1)->create(['user_id' => 3, 'level_id' => 2]);
        factory('App\Src\Level\UserLevel', 1)->create(['user_id' => 4, 'level_id' => 1]);
        factory('App\Src\Level\UserLevel', 1)->create(['user_id' => 4, 'level_id' => 2]);
        factory('App\Src\Level\UserLevel', 1)->create(['user_id' => 4, 'level_id' => 3]);
        factory('App\Src\Level\UserLevel', 1)->create(['user_id' => 4, 'level_id' => 4]);
        factory('App\Src\Level\UserLevel', 1)->create(['user_id' => 5, 'level_id' => 2]);

        factory('App\Src\Subject\UserSubject', 1)->create(['user_id' => 2, 'subject_id' => 1, 'active' => 1]);
        factory('App\Src\Subject\UserSubject', 1)->create(['user_id' => 2, 'subject_id' => 2, 'active' => 0]);
        factory('App\Src\Subject\UserSubject', 1)->create(['user_id' => 2, 'subject_id' => 3, 'active' => 0]);
        factory('App\Src\Subject\UserSubject', 1)->create(['user_id' => 4, 'subject_id' => 1, 'active' => 1]);
        factory('App\Src\Subject\UserSubject', 1)->create(['user_id' => 4, 'subject_id' => 2, 'active' => 1]);
        factory('App\Src\Subject\UserSubject', 1)->create(['user_id' => 4, 'subject_id' => 3, 'active' => 1]);
        factory('App\Src\Subject\UserSubject', 1)->create(['user_id' => 4, 'subject_id' => 4, 'active' => 1]);
        factory('App\Src\Subject\UserSubject', 1)->create(['user_id' => 4, 'subject_id' => 5, 'active' => 1]);
        factory('App\Src\Subject\UserSubject', 1)->create(['user_id' => 4, 'subject_id' => 6, 'active' => 1]);


        factory('App\Src\Question\Question', 1)->create(['user_id'    => 5,
                                                         'subject_id' => 1,
                                                         'level_id'   => 2,
                                                         'body_en'    => 'what is physics ?'
        ]);
        factory('App\Src\Question\Question', 1)->create(['user_id'    => 5,
                                                         'subject_id' => 2,
                                                         'level_id'   => 2,
                                                         'body_en'    => 'what is chemistryy ?'
        ]);
        factory('App\Src\Question\Question', 1)->create(['user_id'    => 3,
                                                         'subject_id' => 2,
                                                         'level_id'   => 2,
                                                         'body_en'    => 'is chemistry easy ?'
        ]);

        factory('App\Src\Answer\Answer', 1)->create(['user_id'     => 2,
                                                     'question_id' => 1,
                                                     'parent_id'   => 0,
                                                     'body_en'     => ' physics is aa asdas asd '
        ]);
        factory('App\Src\Answer\Answer', 1)->create(['user_id'     => 5,
                                                     'question_id' => 1,
                                                     'parent_id'   => 1,
                                                     'body_en'     => ' physics is aa asdas asd aa aa '
        ]);
        factory('App\Src\Answer\Answer', 1)->create(['user_id'     => 2,
                                                     'question_id' => 1,
                                                     'parent_id'   => 1,
                                                     'body_en'     => ' physics is aa asdas asd aa aa '
        ]);
        factory('App\Src\Answer\Answer', 1)->create(['user_id'     => 4,
                                                     'question_id' => 2,
                                                     'parent_id'   => 0,
                                                     'body_en'     => ' chemistry is bla bla aa '
        ]);
        factory('App\Src\Answer\Answer', 1)->create(['user_id'     => 5,
                                                     'question_id' => 2,
                                                     'parent_id'   => 4,
                                                     'body_en'     => ' chemistry is bla bla aa asdas '
        ]);
        factory('App\Src\Answer\Answer', 1)->create(['user_id'     => 4,
                                                     'question_id' => 2,
                                                     'parent_id'   => 4,
                                                     'body_en'     => ' chemistry is bla bla aa asdas asd aa aa '
        ]);

//        $this->call(UserTableSeeder::class);

        Model::reguard();
    }


    private function truncateDatabaseTables()
    {
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
    }

}
