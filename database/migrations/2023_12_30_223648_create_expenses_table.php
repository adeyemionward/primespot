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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('total_cost')->nullable();
            $table->string('payment_type');
            // $table->decimal('amount_paid',10,2);
            $table->bigInteger('amount_paid')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('description')->nullable();
            $table->string('expense_date');
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('expenses');
    }
};
