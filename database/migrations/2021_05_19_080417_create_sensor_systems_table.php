<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_systems', function (Blueprint $table) {
            $table->id();
            $table->string('pi_id')->unique();
            $table->string('ip_address');
            $table->boolean('irrigation');
            $table->float('shutter', 8, 2);
            $table->float('latitude' ,8, 2);
            $table->float('longitude', 8, 2);
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
        Schema::dropIfExists('sensor_systems');
    }
}
