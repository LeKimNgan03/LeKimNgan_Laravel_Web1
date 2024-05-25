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
        Schema::create('lkn_banner', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1000);
            $table->string('link', 1000);
            // $table->string('image', 1000)->nullable();
            $table->unsignedInteger('sort_order')->default(1);
            $table->string('position', 50);
            $table->string('description', 255)->nullable();
            // $table->string('sub_title',225);
            $table->timestamps(); //created_at, updated_at
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lkn_banner');
    }
};
