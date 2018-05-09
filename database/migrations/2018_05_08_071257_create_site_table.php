<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('user_id');
            $table->float('lat', 10, 6);
            $table->float('lng', 10, 6);
            $table->float('begins_from', 10, 6)->nullable();
            $table->float('ends_at', 10, 6)->nullable();
            $table->date('starting_date')->nullable();
            $table->date('ending_date')->nullable();
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
        Schema::dropIfExists('sites');
    }
}
