<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();

            $table->string('storeShortName', 64)->index()->nullable();
            $table->string('storeFullName', 128)->nullable();

            $table->longText('storeApiUrl')->default('www.storeapiurl.com.ar/');
            $table->boolean('enableApiScrapping')->default(true);
            $table->boolean('isaVtexStore')->default(false);

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
        Schema::dropIfExists('stores');
    }
}
