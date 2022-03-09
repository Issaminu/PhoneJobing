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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->string('teleoperateur');
            $table->text('client');
            $table->text('quantity')->nullable();
            $table->text('product')->nullable();
            $table->text('result');
            $table->text('script');
            $table->text('callDate');
            $table->text('callLength');
            $table->text('teleoperateurId');
            $table->text('clientId');
            $table->text('productId')->nullable();
            $table->string('teamid');
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
        Schema::dropIfExists('calls');
    }
};
