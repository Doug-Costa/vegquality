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
        Schema::table('articles', function (Blueprint $table) {
            if (!Schema::hasColumn('articles', 'is_visible_pt')) {
                $table->boolean('is_visible_pt')->default(true)->after('status');
            }
            if (!Schema::hasColumn('articles', 'is_visible_en')) {
                $table->boolean('is_visible_en')->default(true)->after('is_visible_pt');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $columnsToDrop = [];
            if (Schema::hasColumn('articles', 'is_visible_pt')) {
                $columnsToDrop[] = 'is_visible_pt';
            }
            if (Schema::hasColumn('articles', 'is_visible_en')) {
                $columnsToDrop[] = 'is_visible_en';
            }
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
