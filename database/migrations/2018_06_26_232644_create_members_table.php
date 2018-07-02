<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->integer('nim');
            $table->integer('semester');
            $table->integer('generation');
            $table->string('phone');
            $table->string('address');
            $table->text('reason');
            $table->text('hobbies');

            //
            $table->unsignedInteger('ukm_id');
            $table->foreign('ukm_id')->references('id')->on('ukms')->onDelete('cascade');

            $table->unsignedInteger('major_id');
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');

            $table->unsignedInteger('study_program_id');
            $table->foreign('study_program_id')->references('id')->on('study_programs')->onDelete('cascade');

            //
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
        Schema::dropIfExists('members');
    }
}
