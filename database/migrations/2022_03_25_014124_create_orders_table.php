<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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

            $table->unsignedInteger('total');
            $table->text('note');
            $table->unsignedBigInteger('florist_id');
            $table->unsignedBigInteger('customer_id');

            $table->foreign('florist_id')
                ->references('id')
                ->on('florists');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');

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
};
