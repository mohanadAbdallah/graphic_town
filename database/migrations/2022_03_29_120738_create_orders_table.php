<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('app_user_id')->unsigned()->index();
            $table->text('description')->nullable();
            $table->float('total_amount')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('status')->default(0);
            $table->integer('type')->default(1);// payments
            $table->float('delivery_amount')->default(0);
            $table->timestamp('delivery_date')->nullable();
            $table->float('total_amount_with_fees')->default(0);
            $table->string('order_number')->nullable();
            $table->float('rating')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('app_user_id')->references('id')->on('app_users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
