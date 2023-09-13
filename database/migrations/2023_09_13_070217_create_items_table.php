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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('host')->nullable();
            $table->string('risk')->nullable();
            $table->string('base')->nullable();
            $table->string('protocol')->nullable();
            $table->string('port')->nullable();
            $table->string('cve')->nullable();
            $table->string('category_order')->nullable();
            $table->string('name')->nullable();
            $table->string('synopsis')->nullable();
            $table->text('description')->nullable();
            $table->text('solution')->nullable();
            $table->string('plugin')->nullable();
            $table->string('zone')->nullable();
            $table->string('site')->nullable();
            $table->string('unit')->nullable();
            $table->string('so')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
