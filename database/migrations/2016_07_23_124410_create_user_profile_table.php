<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema:create('user_profile',function($table){
			$table->integer('uid')->unsigned()->unique();
			$table->smallInteger('field_id')->unsigned();
			$table->text('field_data')->unique();
			$table->tinyInteger('privacy')->default(0);
		})
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
