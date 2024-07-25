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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('title', 100);
            $table->text('content');
            $table->string('picture_url', 2048);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère avant de supprimer la colonne
            $table->dropForeign(['user_id']);
            // Supprimer les colonnes ajoutées
            $table->dropColumn('user_id');
            $table->dropColumn('title');
            $table->dropColumn('content');
            $table->dropColumn('picture_url');
        });
    }
};
