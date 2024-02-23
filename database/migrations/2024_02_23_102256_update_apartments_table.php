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
        Schema::table('apartments', function (Blueprint $table) {
            $table->json('bathroom');
            $table->json('bedroom_laundry');
            $table->json('entertainment');
            $table->json('for_families');
            $table->json('refrigeration');
            $table->json('kitchen');
            $table->json('ubi_characteristics');
            $table->json('outside');
            $table->json('parking');

            $table->json('views')->nullable();
            $table->json('services')->nullable();
            $table->string('image')->nullable();
            $table->dropColumn('specs');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropColumn('bathroom');
            $table->dropColumn('bedroom_laundry');
            $table->dropColumn('entertainment');
            $table->dropColumn('for_families');
            $table->dropColumn('refrigeration');
            $table->dropColumn('kitchen');
            $table->dropColumn('ubi_characteristics');
            $table->dropColumn('outside');
            $table->dropColumn('parking');
    
            $table->dropColumn('views');
            $table->dropColumn('services');
            $table->dropColumn('image');
        });
    }
};
