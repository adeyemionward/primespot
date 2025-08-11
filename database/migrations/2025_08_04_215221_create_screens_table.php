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
    public function up(): void
    {
        Schema::create('screens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venue_id');
            $table->string('name');
            $table->string('code', 50)->unique();
            $table->string('resolution', 50);
            $table->enum('orientation', ['landscape', 'portrait'])->default('landscape');
            $table->decimal('daily_rate', 10, 2);
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->timestamps(); // Adds created_at and updated_at columns

            // Optional: Add a foreign key constraint
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('screens');
    }
};
