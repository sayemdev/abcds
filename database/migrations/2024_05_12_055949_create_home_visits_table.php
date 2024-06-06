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
        Schema::create('home_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->float('lat');
            $table->float('lng');
            $table->integer('zoom_level');
            $table->date('visit_date');
            $table->string('attach')->nullable();
            $table->string('read')->default(false);
            $table->string('status');
            $table->timestamps();
            $table->foreignId('branch_id');
            $table->string('visit_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_visits');
    }
};
