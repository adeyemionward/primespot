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
        Schema::create('media', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('user_id'); // BIGINT UNSIGNED NOT NULL
            $table->string('file_path'); // VARCHAR(255) NOT NULL
            $table->enum('file_type', ['image', 'video']); // ENUM('image', 'video') NOT NULL
            $table->string('thumbnail_path')->nullable(); // VARCHAR(255) NULL
            $table->integer('duration')->nullable(); // INT NULL
            $table->bigInteger('size'); // BIGINT NOT NULL
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // ENUM with default value
            $table->timestamps(); // Handles created_at and updated_at

            $table->foreign('user_id')->references('id')->on('users'); // FOREIGN KEY (user_id) REFERENCES users(id)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
};
