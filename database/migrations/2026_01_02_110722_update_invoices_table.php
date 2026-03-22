<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreignId('page_id')->default(0)->after('status');
            $table->foreignId('voucher_id')->default(0)->after('page_id');
            $table->double('sub_total')->default(0)->after('product_count');
            $table->double('discount')->default(0)->after('sub_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn(['page_id', 'voucher_id', 'sub_total', 'discount']);
        });
    }
}
