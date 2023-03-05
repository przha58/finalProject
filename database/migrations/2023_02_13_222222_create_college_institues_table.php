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
        Schema::create('college__institues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('type');
            $table->string('DeanName');
            $table->string('DeanEmail');
            $table->text('address');
            $table->string('gps_lon');
            $table->string('gps_lat');
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
        Schema::dropIfExists('college_institues');
    }
};
