<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('id_user', 200);
            $table->date('date');
            $table->time('time');
            $table->int('ph');
            $table->int('tds');
            $table->int('water_temp');
            $table->int('humidity');
            $table->int('heat_index');
            $table->date('created_at');
            $table->dateTime('updated_at');
            $table->varchar('_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessors');
    }
};
