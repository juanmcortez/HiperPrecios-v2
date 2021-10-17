<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('metaName', 128)->nullable();
            $table->string('metaTitle', 128)->nullable();
            $table->longText('metaDescription')->nullable();

            $table->string('nameShort', 128)->nullable();
            $table->string('nameLong', 256)->index()->nullable();
            $table->string('ean', 20)->index()->nullable();

            $table->float('measuramentMultiplier', 8, 2)->default(1)->nullable();
            $table->string('measuramentUnit', 3)->default('kg')->nullable();

            $table->unsignedBigInteger('belongsToCategory')->index()->nullable();
            $table->unsignedBigInteger('belongsToBrand')->nullable();

            $table->longText('imageUrl')->nullable();

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
        Schema::dropIfExists('products');
    }
}
