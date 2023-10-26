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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("can_view");
            $table->boolean("can_comment");
            $table->boolean("can_post");
            $table->boolean("can_edit_own");
            $table->boolean("can_edit_all");
            $table->boolean("can_announce");
            $table->boolean("can_mute");
            $table->boolean("can_kick");
            $table->boolean("can_ban");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
