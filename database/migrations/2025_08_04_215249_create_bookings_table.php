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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('user_id'); // BIGINT UNSIGNED NOT NULL
            $table->unsignedBigInteger('screen_id'); // BIGINT UNSIGNED NOT NULL
            $table->string('media_path'); // BIGINT UNSIGNED NOT NULL
            $table->string('reference', 50)->unique(); // VARCHAR(50) UNIQUE NOT NULL
            $table->date('start_date'); // DATE NOT NULL
            $table->date('end_date'); // DATE NOT NULL
            $table->integer('days');
            $table->text('content')->nullable(); // VARCHAR NULLABLE
            $table->enum('payment_status', ['pending', 'paid', 'cancelled'])->default('pending'); // ENUM with default value

            $table->timestamps(); // Handles created_at and updated_at

            $table->foreign('user_id')->references('id')->on('users'); // FOREIGN KEY
            $table->foreign('screen_id')->references('id')->on('screens'); // FOREIGN KEY
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
