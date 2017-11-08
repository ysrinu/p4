<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 45);
            $table->string('manufacturer', 45);
            $table->string('asset_description', 191)->nullable();
            $table->string('owner', 45);
            $table->integer('device_type_id');
            $table->decimal('purchase_price');
            $table->date('purchase_date');
            $table->string('device_group_name', 45)->nullable();
            $table->string('device_group_description', 191)->nullable();
            $table->string('serial_number', 45);
            $table->string('warranty_info', 191)->nullable();
            $table->string('device_notes', 191)->nullable();
            $table->string('device_repair_notes', 191)->nullable();
            $table->integer('estimated_device_life')->nullable();
            $table->smallInteger('scheduled_retirement_year');
            $table->string('asset_tag', 45);
            $table->string('picture_link', 191)->nullable();
            $table->dateTime('decomissioned_at')->nullable();
            $table->decimal('memory')->nullable();
            $table->string('model', 45)->nullable();
            $table->string('software', 191)->nullable();
            $table->string('mac_address', 45)->nullable();
            $table->string('comments', 191)->nullable();
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
