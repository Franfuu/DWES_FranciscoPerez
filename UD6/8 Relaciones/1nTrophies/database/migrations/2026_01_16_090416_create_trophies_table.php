<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trophies', function (Blueprint $table) {
            $table->id();
            // FK to users; cascade so deleting a user removes their trophies
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title');                 // trophy name
            $table->string('description')->nullable(); // optional details
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trophies');
    }
}; 