<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('temporadas');
            $table->string('poster');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('series');
    }
}
