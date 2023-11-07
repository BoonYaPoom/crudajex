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
        Schema::create('users', function (Blueprint $table) {
           
		$table->increments('uid');
        $table->string('username', 50)->collation('utf8_general_ci');
        $table->string('password', 255)->nullable()->collation('utf8_general_ci');
        $table->string('role', 1)->collation('utf8_general_ci');
        $table->dateTime('date');
        $table->dateTime('update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
