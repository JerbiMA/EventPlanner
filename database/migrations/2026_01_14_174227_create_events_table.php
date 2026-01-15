<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');

            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->string('place');
            $table->integer('capacity');

            $table->decimal('price', 8, 2)->nullable();
            $table->boolean('is_free')->default(false);

            $table->string('image')->nullable();
            $table->boolean('status')->default(true); // active / archived

            // Relations
            $table->foreignId('category_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('created_by')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
