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
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->string('contact');
            $table->string('address');
            $table->string('email');
            $table->string('reqphysician');
            $table->string('package1');
            $table->string('package2');
            $table->string('package3');
            $table->string('package4');
            $table->string('individualTest1');
            $table->string('individualTest2');
            $table->string('individualTest3');
            $table->string('individualTest4');
            $table->string('individualTest5');
            $table->string('individualTest6');
            $table->string('individualTest7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnostics');
    }
};
