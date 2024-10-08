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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('structure');
            $table->string('logo');
            $table->longText('logo_desc');
            $table->longText('vision');
            $table->longText('mission');
            $table->longText('organization_desc');
            $table->integer('period');
            $table->integer('active_members');
            $table->string('area');
            $table->string('alumni_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
