<?php

use App\Genre;
use App\Models\Content;
use App\Models\Season;
use App\Models\Show;
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
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Season::class)->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->integer('episode')->nullable();
            $table->unique(['season_id', 'episode']);
            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->string('trailer_url', 512)->nullable();
            $table->string('video_url', 512)->nullable();
            $table->string('image_url', 512)->nullable();
            $table->enum('genre', array_column(Genre::cases(), 'value'));
            $table->string('subgenre')->nullable();
            $table->integer('length');
            $table->string('language');
            $table->date('released_at')->nullable();
            $table->json('cast')->nullable()->index();
            $table->json('content_labels')->nullable();
            $table->boolean('safe_for_children')->default(false);
            $table->json('meta_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content');
    }
};
