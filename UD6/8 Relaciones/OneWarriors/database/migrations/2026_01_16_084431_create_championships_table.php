<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('championships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('warrior_equipment');
            $table->timestamps();


        // Additional fields can be added here if needed // Ensure one championship per user
            // This assumes that a user can only have one championship
            // If you want to allow multiple championships per user, remove this line
            $table->unique('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('championships');
    }
};