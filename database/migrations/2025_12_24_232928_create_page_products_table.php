<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_products', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 50);
            $table->string('image', 255)->nullable();
            $table->double('quantity')->default(0);
            $table->foreignId('stock_status_id')->default(0);
            $table->double('original_price')->default(0);
            $table->double('price')->default(0);
            $table->integer('point')->default(0);
            $table->text('shopee_link')->nullable();
            $table->text('lazada_link')->nullable();
            $table->text('tiki_link')->nullable();
            $table->dateTime('date_available')->nullable();
            $table->integer('viewed')->default(0);
            $table->integer('sort_order')->default(0);
            $table->integer('featured')->default(false);
            $table->boolean('display');
            $table->boolean('status');
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
        Schema::dropIfExists('page_products');
    }
}
