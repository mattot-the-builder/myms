<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mileage_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained()->cascadeOnDelete();
            $table->date('trip_date');
            $table->string('trip_name');
            $table->string('starting_location');
            $table->string('destination');
            $table->decimal('mileage', 8, 2);
            $table->decimal('fuel_cost', 8, 2);
            $table->decimal('total_claim', 8, 2);
            $table->enum('status', ['pending', 'approved', 'rejected', 'claimed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mileage_claims');
    }
};
