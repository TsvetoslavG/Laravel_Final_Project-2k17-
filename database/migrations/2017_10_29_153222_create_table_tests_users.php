<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTestsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_users', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->integer('test_id');
			$table->integer('spec_id');
			$table->double('result_1');
			$table->double('result_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests_users');
    }
}
