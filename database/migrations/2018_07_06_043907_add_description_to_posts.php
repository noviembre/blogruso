<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #=================== si te muestra un mensaje de error al create esta migracion
        #==== ejemplo: ErrorException .... failed to open stream: No such a file
        #=== solo ejecuta: composer dump-autoload
        Schema::table('posts', function(Blueprint $table){
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table){
            $table->dropColumn('description');
        });
    }
}
