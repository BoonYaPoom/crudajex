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
        Schema::create('category', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_th', 200)->collation('utf8_general_ci');
            $table->string('cover', 255)->nullable()->collation('utf8_general_ci');
            $table->dateTime('category_date');
            $table->dateTime('category_update')->nullable();
            $table->integer('page_id');
            $table->string('category_status', 1)->collation('utf8_general_ci');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
