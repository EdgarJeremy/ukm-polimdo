<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoColumnOnUkms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ukms', function(Blueprint $table){
            $table->text('profile');
            $table->text('logo_meaning');
            $table->text('vision');
            $table->text('mission');
            $table->text('faqs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ukms', function(Blueprint $table){
            $table->dropColumn('profile');
            $table->dropColumn('logo_meaning');
            $table->dropColumn('vision');
            $table->dropColumn('mission');
            $table->dropColumn('faqs');
        });
    }
}
