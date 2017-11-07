<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBlogsTableMakeDescriptionMediumText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
            DB::statement('ALTER TABLE `blogs` MODIFY `description_en` MEDIUMTEXT;');
            DB::statement('ALTER TABLE `blogs` MODIFY `description_ar` MEDIUMTEXT;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
//            DB::statement('ALTER TABLE `orders` MODIFY `project_id` INTEGER NOT NULL;');
        });
    }
}
