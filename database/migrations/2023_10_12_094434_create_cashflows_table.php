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
            $table->id('IdFinance'); // Primary key
            $table->string('Cashflow', 255); // String column with a maximum length of 255 characters
            $table->enum('Type', ['income', 'outcome']); // Enum column with two possible values
            $table->string('Category'); // String column
            $table->integer('Total'); // Integer column
            $table->string('Desc'); // Integer column
            $table->unsignedBigInteger('stockid')->nullable(); // Nullable unsigned big integer
            $table->unsignedBigInteger('voiceid')->nullable(); // Nullable unsigned big integer

            $table->timestamps(); // Created at and updated at timestamps
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
