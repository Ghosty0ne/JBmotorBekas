<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('listings', function (Blueprint $table) {
        $table->string('category')->nullable();
        $table->integer('year')->nullable();
        $table->integer('engine_cc')->nullable();
        $table->integer('mileage')->nullable();
    });
}

public function down(): void
{
    Schema::table('listings', function (Blueprint $table) {
        $table->dropColumn(['category', 'year', 'engine_cc', 'mileage']);
    });
}
};
