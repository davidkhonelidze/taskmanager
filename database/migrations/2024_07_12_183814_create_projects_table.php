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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('homepage', 255)->nullable();
            $table->boolean('is_public');
            $table->integer('parent_id')->nullable();
            $table->string('identifier', 255)->nullable();
            $table->integer('status');
            $table->integer('ltf')->nullable();
            $table->integer('rgt')->nullable();
            $table->integer('inherit_numbers');
            $table->integer('default_version_id')->nullable();
            $table->integer('default_assigned_to_id')->nullable();
            $table->integer('default_issue_query_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
