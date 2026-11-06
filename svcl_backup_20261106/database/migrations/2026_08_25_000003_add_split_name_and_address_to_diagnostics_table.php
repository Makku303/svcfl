<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('diagnostics', function (Blueprint $table): void {
            $table->string('firstName')->nullable()->after('name');
            $table->string('lastName')->nullable()->after('firstName');
            $table->string('houseBuildingNo')->nullable()->after('contact');
            $table->string('streetName')->nullable()->after('houseBuildingNo');
            $table->string('barangaySubdivision')->nullable()->after('streetName');
            $table->string('cityMunicipality')->nullable()->after('barangaySubdivision');
            $table->string('region')->nullable()->after('cityMunicipality');
            $table->string('zipCode', 20)->nullable()->after('region');
        });
    }

    public function down(): void
    {
        Schema::table('diagnostics', function (Blueprint $table): void {
            $table->dropColumn([
                'firstName',
                'lastName',
                'houseBuildingNo',
                'streetName',
                'barangaySubdivision',
                'cityMunicipality',
                'region',
                'zipCode',
            ]);
        });
    }
};
