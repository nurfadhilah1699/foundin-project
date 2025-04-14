<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained(table: 'users', indexName: 'posts_user_id')
                ->onDelete('cascade'); // relasi ke users
            $table->string('title');
            $table->text('description'); // isinya bisa teks bebas + link
            $table->string('image')->nullable(); // opsional, untuk thumbnail/poster
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};