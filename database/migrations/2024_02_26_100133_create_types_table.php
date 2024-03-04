<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('icons', function (Blueprint $table) {
            $table->foreignId('type')->constrained('types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('icons', function (Blueprint $table) {
            $table->dropForeign(['type']);
        });

        Schema::dropIfExists('types');
    }
}
