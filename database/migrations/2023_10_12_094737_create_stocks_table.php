<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('stockid');
            $table->string('items');
            $table->decimal('sell_price', 10, 2);
            $table->decimal('buy_price', 10, 2);
            $table->integer('stock');
            $table->string('type');
            $table->unsignedBigInteger('iduser')->nullable();
            $table->timestamps(); 
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
