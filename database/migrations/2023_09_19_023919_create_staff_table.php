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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->enum('staff_status', ['Permanent Staff', 'Contract Staff', 'Internship']);
            $table->string('ic_number');
            $table->integer('age');
            $table->string('gender');
            $table->text('address');
            $table->string('contact');
            $table->date('dob');
            $table->string('pob');
            $table->string('position');
            $table->string('marital_status');
            $table->date('start_date_working');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_contact')->nullable();
            $table->string('spouse_position')->nullable();
            $table->string('spouse_company')->nullable();
            $table->string('emergency_contact');
            $table->string('emergency_contact_relationship');
            $table->string('education');
            $table->string('vehicle_registration')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
