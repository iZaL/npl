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
        'educators'
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

        factory('App\Src\User\User', 1)->create();
        factory('App\Src\User\User', 1)->create(['email'=>'educator@test.com','np_code'=>'NP2122']);
        factory('App\Src\User\User', 1)->create(['email'=>'student@test.com','np_code'=>'NP2123']);
        factory('App\Src\Subject\Subject', 1)->create();
        factory('App\Src\Subject\Subject', 1)->create(['name_ar'=>'chemistry','name_en'=>'chemistry']);
        factory('App\Src\Subject\Subject', 1)->create(['name_ar'=>'math','name_en'=>'math']);
        factory('App\Src\Subject\Subject', 1)->create(['name_ar'=>'english','name_en'=>'english']);
        factory('App\Src\Subject\Subject', 1)->create(['name_ar'=>'french','name_en'=>'french']);
        factory('App\Src\Subject\Subject', 1)->create(['name_ar'=>'arabic','name_en'=>'arabic']);
        factory('App\Src\Level\Level', 1)->create(['name_ar'=>'university','name_en'=>'university']);
        factory('App\Src\Level\Level', 1)->create(['name_ar'=>'medium','name_en'=>'medium']);
        factory('App\Src\Level\Level', 1)->create(['name_ar'=>'elementary','name_en'=>'elementary']);
        factory('App\Src\Level\Level', 1)->create(['name_ar'=>'high school','name_en'=>'high school']);
        factory('App\Src\Level\UserLevel', 1)->create(['user_id'=>1,'level_id'=>1]);
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
