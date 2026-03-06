<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->string('manufacturer_name')->nullable();
            $table->string('model_name')->nullable();
            $table->string('nickname')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->enum('wheelbase', ['short', 'medium', 'long', 'extra_long'])->default('medium');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vans');
    }
};
