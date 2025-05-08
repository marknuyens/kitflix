<?php

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
            $table->foreignIdFor(Show::class)->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->integer('show_season');
            $table->integer('show_episode');
            $table->unique(['show_id', 'show_season', 'show_episode']);
            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('genre');
            $table->string('subgenre')->nullable();
            $table->integer('length');
            $table->string('language');
            $table->date('release_date')->nullable();
            $table->json('cast')->nullable()->index();
            $table->integer('age_restriction')->nullable();
            $table->json('content_warning')->nullable();
            $table->json('meta_data');
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
