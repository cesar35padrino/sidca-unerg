<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeridsTable extends Migration
{
    public function up()
    {
        Schema::create('perids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('perid')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perids');
    }
}
