<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedTinyInteger('type');
            $table->unsignedMediumInteger('occupancy');
            $table->unsignedInteger('bed_id');
            $table->double('size');
            $table->unsignedInteger('view_id');
            $table->text('description');
            $table->text('detail');
            $table->unsignedInteger('price_per_day');
            $table->unsignedInteger('extra_bed_price_per_day');
            $table->string('thumbnail', 250);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room');
    }
};
