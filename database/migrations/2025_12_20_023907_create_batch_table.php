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
        Schema::create('batch', function (Blueprint $table) {
            $table->id();
            $table->string('batch_code', 25)->unique()->nullable();

            $table->unsignedBigInteger('product_id');

            $table->date('exp_date');

            $table->timestamps();

            // Foreign Key
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('restrict')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('batch');
    }
};
