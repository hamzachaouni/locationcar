<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->string('photo');
            $table->double('price');
            $table->double('places');
            $table->double('suitcase');
            $table->double('portes');
            $table->string('automatique', 20)->nullable();
            $table->string('audio_input', 20)->nullable();
            $table->string('bluetouth', 20)->nullable();
            $table->string('heatedseats', 20)->nullable();
            $table->string('air_conditioner', 20)->nullable();
            $table->string('allwheeldrive', 20)->nullable();
            $table->string('usb_input', 20)->nullable();
            $table->string('fm_radio', 20)->nullable();
            $table->date('date_entry');
            $table->string('consumption_ratio');
            $table->softDeletes();
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
        Schema::dropIfExists('cars');
    }
}
