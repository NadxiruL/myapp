<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('checkout_customer_id')->nullable()->index();
            $table->foreignId('checkout_product_id')->nullable()->index();
            $table->double('product_price')->nullable();
            $table->string('product_name')->nullable();
            $table->bigInteger('product_quantity')->nullable();
            $table->double('total_price')->nullable();
            //$table->foreignId('checkout_category_id')->nullable()->index();
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
        Schema::dropIfExists('checkouts');
    }
}
