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
            $table->string('invoice_unique_id')->unique();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                  ->references('id')->on('customers')
                  ->onDelete('cascade');
            $table->string('invoice_date');
            $table->string('fiscal_year');
            $table->float('subtotal');
            $table->float('vat_amount')->default(0);
            $table->float('total_amount');
            $table->text('amount_in_words');
            $table->string('received_by');
            $table->enum('status', ['Draft','Sent','Partial','Paid','Cancelled']);
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
