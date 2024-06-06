<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulturePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culture_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('culture_id');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('culture_id')->references('id')->on('cultures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('culture_prices');
    }
}
