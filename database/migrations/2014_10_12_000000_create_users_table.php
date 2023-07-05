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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->biginteger('discord')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('identification');
            $table->date('entry')->default(now());
            $table->date('departure')->nullable();
            $table->string('reason')->nullable();
            $table->integer('restrictionClass')->default(0);
            $table->boolean('isActive')->default(true);
            $table->foreignId('rank_id')->constrained()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
