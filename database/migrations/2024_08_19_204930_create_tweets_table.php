<?php

use App\TweetType;
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
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->text('body')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', [TweetType::values()]);
            $table->foreignId('original_tweet_id')->nullable()->constrained('tweets')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('tweets')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweets');
    }
};
