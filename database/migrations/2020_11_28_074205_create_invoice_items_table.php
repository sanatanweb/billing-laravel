<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')
                  ->references('id')->on('invoices')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')
                  ->references('id')->on('items');
            $table->float('rate');
            $table->integer('quantity');
            $table->float('discount')->nullable();
            $table->enum('discount_type',['%','Amt'])->nullable();
            $table->float('subtotal');
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
        Schema::dropIfExists('invoice_items');
    }
}
