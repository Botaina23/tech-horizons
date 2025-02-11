<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeUserTable extends Migration
{
    public function up()
    {
        Schema::create('theme_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère vers users
            $table->foreignId('theme_id')->constrained()->onDelete('cascade'); // Clé étrangère vers themes
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('theme_user');
    }
}
