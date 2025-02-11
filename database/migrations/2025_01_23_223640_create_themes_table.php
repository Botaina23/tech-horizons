<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nom du thème
            $table->text('description')->nullable(); // Description du thème
            $table->string('image')->nullable(); // Image associée au thème
            $table->unsignedBigInteger('created_by'); // Créateur du thème
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('themes');
    }
};