<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteMisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('text');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        
        Schema::create('usabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('categori_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('usabiliti_id');
            $table->string('title');
            $table->string('format');
            $table->string('attachments');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('status_id');
            $table->timestamps();
        });

        Schema::create('request_approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
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
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('usabilities');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('request_approvals');
    }
}
