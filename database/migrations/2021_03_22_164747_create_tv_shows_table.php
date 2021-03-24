<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvShow', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('poster_path')->nullable();
            $table->longText('overview');
            $table->decimal('vote_average');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tvShow');
    }
}
