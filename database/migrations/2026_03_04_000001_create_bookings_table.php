<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->string('service_name'); // snapshot name
            $table->date('check_in');
            $table->date('check_out');
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'paid', 'completed'])->default('pending');
            $table->timestamps();

            $table->foreign('service_id')
                  ->references('id')
                  ->on('accommodation_services')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
