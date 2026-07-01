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
        Schema::create('Products', function (Blueprint $table) {
    $table->id();
    // Babalik tayo dito sa user_id maya-maya sa baba
    $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate();
    $table->string('Product_name');
    $table->integer('Quantity');
    
    // Palitan ng decimal(total digits, decimal places)
    $table->decimal('Price', 10, 2); 
    $table->decimal('Total', 10, 2); 
    
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
