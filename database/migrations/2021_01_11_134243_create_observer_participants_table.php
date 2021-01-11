<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObserverParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observer_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('observer_id');
            $table->foreign('observer_id')->references('id')->on('users');
            $table->foreignId('participant_id')->constrained('participants');
            $table->integer('session');
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
        Schema::dropIfExists('observer_participants');
    }
}
