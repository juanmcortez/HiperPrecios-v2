<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('belongsToProduct')->index()->nullable();
            $table->unsignedBigInteger('belongsToStore')->nullable();

            $table->decimal('price', 8, 2)->index()->default(0)->nullable();
            $table->decimal('listPrice', 8, 2)->default(0)->nullable();
            $table->decimal('priceWithoutDiscount', 8, 2)->default(0)->nullable();

            $table->integer('availableQuantity')->default(1)->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('prices');
    }
}
