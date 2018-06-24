<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['in', 'out', 'transfer']);
            $table->decimal('cash');
            //
            $table->unsignedInteger('cash_id')->nullable();
            $table->foreign('cash_id')->references('id')->on('cashes')->onDelete('cascade');

            $table->date('action_date');
            $table->text('description');
            $table->string('file');
            //
            $table->unsignedInteger('cash_id_from')->nullable();
            $table->unsignedInteger('cash_id_to')->nullable();
            $table->foreign('cash_id_from')->references('id')->on('cashes')->onDelete('cascade');
            $table->foreign('cash_id_to')->references('id')->on('cashes')->onDelete('cascade');
            
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
        Schema::dropIfExists('transactions');
    }
}
