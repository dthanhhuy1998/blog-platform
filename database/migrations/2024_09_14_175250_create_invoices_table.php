<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code', 255)->nullable();
            $table->string('firstname', 255)->nullable();
            $table->string('lastname', 255)->nullable();
            $table->string('fullname', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('province', 10)->nullable();
            $table->string('district', 10)->nullable();
            $table->string('ward', 10)->nullable();
            $table->string('address', 255)->nullable();
            $table->text('note')->nullable();
            $table->double('product_count')->default(0);
            $table->double('price_total')->default(0);
            $table->double('tax')->default(0);
            $table->string('status', 50)->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
