<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalExternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_externals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('internalParent')->nullable()->default(1);
            $table->unsignedBigInteger('externalParent')->nullable()->default(0);

            $table->string('externalName', 128)->nullable();
            $table->string('externalSlug', 128)->nullable();

            $table->unsignedBigInteger('externalCategoryID')->nullable()->default(0);

            $table->unsignedBigInteger('internalStoreID')->nullable()->default(1);

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
        Schema::dropIfExists('internal_externals');
    }
}
