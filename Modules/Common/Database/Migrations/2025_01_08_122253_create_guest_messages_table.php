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
        Schema::create('guest_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reply')->nullable(); // Mengizinkan null untuk reply
            $table->string('email');
            $table->string('whatsapp_code')->default('id');
            $table->unsignedBigInteger('whatsapp_number');
            $table->string('subject');
            $table->text('message');
            $table->dateTime('seen_at')->nullable();
            $table->char('seen_by', 8)->nullable();
            $table->timestamps();

            $table->foreign('seen_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_messages');
    }
};
