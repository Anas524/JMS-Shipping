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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            
            // contact | quote | resource
            $table->string('type')->index();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('subject')->nullable();
            $table->text('message')->nullable();

            // quote fields (optional)
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('shipment_type')->nullable(); // air/sea/land etc
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('incoterm')->nullable();

            // meta
            $table->string('page_url')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 500)->nullable();

            $table->boolean('is_read')->default(false)->index();
            $table->timestamp('read_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
