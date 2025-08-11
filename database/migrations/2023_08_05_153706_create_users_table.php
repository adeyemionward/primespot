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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // The user's name.
            $table->string('name');

            // The user's email address, which must be unique.
            $table->string('email')->unique();

            // The user's phone number. Made nullable as it might not always be provided.
            $table->string('phone')->nullable();

            // The name of the user's company. Made nullable.
            $table->string('company')->nullable();

            // The user's address. Using 'text' for a potentially longer string, and it's nullable.
            $table->text('address')->nullable();
            $table->text('status')->nullable();
            $table->text('user_type')->nullable();

            // The user's hashed password.
            $table->string('password');

            // A token for "remember me" functionality.
            $table->rememberToken();

            // The default timestamps for created_at and updated_at columns.
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
        Schema::dropIfExists('users');
    }
};
