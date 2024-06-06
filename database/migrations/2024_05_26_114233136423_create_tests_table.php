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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained(); // Add foreign key constraint
            $table->foreignId('parent_id')->nullable()->constrained('tests')->onDelete('cascade');
            $table->string('name');
            $table->string('shortcut', 50)->nullable();
            $table->string('sample_type', 100)->nullable();
            $table->string('unit', 50)->nullable();
            $table->string('reference_range')->nullable();
            $table->string('type', 50)->nullable();
            $table->boolean('separated')->default(false);
            $table->decimal('price', 10, 2)->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('title')->default(false);
            $table->text('precautions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
