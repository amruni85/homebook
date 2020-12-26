<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homebooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('checkin');
            $table->string('checkout');
            $table->unsignedBigInteger('adult');
            $table->unsignedBigInteger('child')->nullable();
            $table->unsignedBigInteger('infant')->nullable();
            $table->string('attachment');
            $table->text('notes')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('homebooks');
    }
}
