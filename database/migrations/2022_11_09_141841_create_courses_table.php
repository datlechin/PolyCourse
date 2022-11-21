<?php

use App\Enums\InstructionalLevel;
use App\Models\Category;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->constrained();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle', 300)->nullable();
            $table->text('description')->nullable();
            $table->string('level')->default(InstructionalLevel::All->value);
            $table->float('price')->default(0);
            $table->string('trailer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
