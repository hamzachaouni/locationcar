<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ourinformations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address', 100);
            $table->string('url_facebook', 100);
            $table->string('url_twitter', 100);
            $table->string('url_instagrame', 100);
            $table->string('url_maps');
            $table->string('email', 100);
            $table->text('about');
            $table->string('slider_img_i');
            $table->string('slider_img_ii');
            $table->string('slider_img_iii');
            $table->double('telephone');
            $table->dateTime('start_work_from');
            $table->dateTime('end_work_to');
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
        Schema::dropIfExists('ourinformations');
    }
}
