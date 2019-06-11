<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRequestProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('request_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('request_id');
            $table->string('product_id');
            $table->timestamps();
        });

        Schema::create('request_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('request_id');
            $table->string('attachment');
            $table->string('name');
            $table->string('alias');
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
        //
        Schema::dropIfExists('request_products');
        Schema::dropIfExists('request_attachments');
    }
}
