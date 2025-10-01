<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasing', function (Blueprint $table) {
            $table->id();
            $table->integer('supplier_id')->nullable();
            $table->dateTime('purchase_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('total', 12, 2)->default(0);
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasing');
    }
};
