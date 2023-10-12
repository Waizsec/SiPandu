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
        Schema::create('cashflows', function (Blueprint $table) {
            $table->id('idfinance'); // Primary key
            $table->string('cashflow', 255); // String column with a maximum length of 255 characters
            $table->enum('type', ['income', 'outcome']); // Enum column with two possible values
            $table->string('category'); // String column
            $table->integer('total'); // Integer column
            $table->string('desc'); // Integer column
            $table->unsignedBigInteger('stockid')->nullable();
            $table->unsignedBigInteger('voiceid')->nullable();
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
        Schema::dropIfExists('cashflows');
    }
};
