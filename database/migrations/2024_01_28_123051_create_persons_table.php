<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();

            $table->integer('adoazonositojel');
            $table->string('teljesnev');
            $table->integer('azonosito');
            $table->integer('egyebid');
            $table->dateTime('belepes');
            $table->dateTime('kilepes');
            $table->string('emailcim');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
