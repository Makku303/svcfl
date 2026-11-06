<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('individualtest', function (Blueprint $table): void {
            $table->unsignedInteger('packageId')->nullable()->after('individualTest');
            $table->foreign('packageId')->references('id')->on('packages')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('individualtest', function (Blueprint $table): void {
            $table->dropForeign(['packageId']);
            $table->dropColumn('packageId');
        });
    }
};
