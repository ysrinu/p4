<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarrantiesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('warranties', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->timestamps();
            $table->string('description', 50);
            $table->date('start_date');
            $table->date('end_date');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('warranties');
    }
}
