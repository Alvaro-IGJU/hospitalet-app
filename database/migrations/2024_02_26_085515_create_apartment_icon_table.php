<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('apartment_icon', function (Blueprint $table) {
            // Define apartment_id y icon_id como claves primarias y foráneas
            $table->foreignId('apartment_id')->constrained()->onDelete('cascade')->primary();
            $table->foreignId('icon_id')->constrained()->onDelete('cascade')->primary();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apartment_icon');
    }
};

