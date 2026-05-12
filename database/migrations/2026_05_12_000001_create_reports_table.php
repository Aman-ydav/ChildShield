<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('child_name')->nullable();
            $table->unsignedTinyInteger('age');
            $table->string('gender');
            $table->string('location');
            $table->text('description');
            $table->string('reporter_contact');
            $table->string('image')->nullable();
            $table->string('status')->default('pending');
            $table->text('admin_remark')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};