<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnApprovedToTestsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests_users', function (Blueprint $table) {
            $table->double('final_result')->nullable()->after('result_2');
			$table->boolean('approved')->default(false)->after('final_result');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests_users', function (Blueprint $table) {
            //
        });
    }
}
