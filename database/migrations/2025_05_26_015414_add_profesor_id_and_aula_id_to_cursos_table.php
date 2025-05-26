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
        Schema::table('cursos', function (Blueprint $table) {
            $table->unsignedBigInteger('profesor_id')->nullable()->after('creditos');
            $table->unsignedBigInteger('aula_id')->nullable()->after('profesor_id');

            $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('set null');
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['profesor_id']);
            $table->dropForeign(['aula_id']);
            $table->dropColumn(['profesor_id', 'aula_id']);
        });
    }
};
