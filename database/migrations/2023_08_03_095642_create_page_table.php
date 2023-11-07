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
        Schema::create('page', function (Blueprint $table) {
            $table->increments('page_id');
            $table->string('page_name', 255)->collation('utf8_general_ci');
            $table->string('page_path', 255)->nullable()->collation('utf8_general_ci');
            $table->string('page_status', 1)->collation('utf8_general_ci');
            $table->dateTime('page_createdate');
            $table->dateTime('page_update')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page');
    }
};
