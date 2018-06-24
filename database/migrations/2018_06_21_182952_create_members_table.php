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
            $table->string('nim');
            $table->string('jurusan');
            $table->string('prodi');
            $table->integer('semester');
            $table->string('angkatan');
            $table->string('phone');
            $table->string('address');
            $table->text('reason');
            $table->text('hobbies');

            $table->unsignedInteger('ukm_id');
            $table->foreign('ukm_id')->references('id')->on('ukms')->onDelete('cascade');

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
