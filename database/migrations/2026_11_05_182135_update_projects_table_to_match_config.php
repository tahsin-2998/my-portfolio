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
        Schema::table('projects', function (Blueprint $table) {
            // Rename or add columns to match config keys
            if (!Schema::hasColumn('projects', 'text')) {
                $table->text('text')->after('description');
            }
            if (!Schema::hasColumn('projects', 'cover')) {
                $table->string('cover')->default('cover-1')->after('image');
            }
            if (!Schema::hasColumn('projects', 'tags')) {
                $table->json('tags')->after('technologies');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('match_config', function (Blueprint $table) {
            //
        });
    }
};
