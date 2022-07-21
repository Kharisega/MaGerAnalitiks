<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MalamGoldenFishDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MalamGoldenFish', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('eventName');
            $table->integer('eventVersion');
            $table->integer('goldenTicket');
            $table->integer('playDuration');
            $table->integer('playTime');
            $table->char('playerID', 255);
            $table->integer('score');
            $table->integer('silverTicket');
            $table->integer('stars');
            $table->date('timestamp');
            $table->float('durationPerPlay');
            $table->float('freePerTicket');
            $table->float('silverPerTicket');
            $table->float('goldenPerTicket');
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
        //
    }
}
