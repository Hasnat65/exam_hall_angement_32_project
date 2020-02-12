<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTeachersModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('t_name', 100);
            $table->string('dept_name', 33);
            $table->string('total_duty')->nullable();;
            $table->integer('exam_duty')->nullable();
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
        Schema::dropIfExists('teachers_models');
    }
}
