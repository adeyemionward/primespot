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
        Schema::table('screens', function (Blueprint $table) {
            $table->decimal('commission_rate',10,2)->after('daily_rate')->default(0.00);
            $table->foreignId('host_id')
                ->nullable()
                ->constrained('users')
                ->after('venue_id')
                ->nullOnDelete();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('screens', function (Blueprint $table) {
            $table->dropColumn('commission_rate');
            $table->dropForeign(['host_id']);
            $table->dropColumn('host_id');
        });
    }
};
