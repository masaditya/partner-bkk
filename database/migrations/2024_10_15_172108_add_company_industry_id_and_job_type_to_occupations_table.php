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
        Schema::table('occupations', function (Blueprint $table) {
            $table->uuid('company_industry_id')->after('id');
            $table->string('job_type')->after('company_industry_id'); 
            $table->foreign('company_industry_id')->references('id')->on('company_industries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('occupations', function (Blueprint $table) {
            $table->dropForeign(['company_industry_id']);
            $table->dropColumn('company_industry_id');
            $table->dropColumn('job_type');
        });
    }
};
