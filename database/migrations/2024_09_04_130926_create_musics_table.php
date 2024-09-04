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
        Schema::create('musics', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('description');
            $table->text('content')->unique();
            $table->enum('status', ['show', 'hidden']);
            $table->integer('view')->unsigned()->default(0);
            $table->text('cover');
            $table->bigInteger('singer_id')->unsigned();
            $table->bigInteger('menu_id')->unsigned();
            $table->enum('reactionable', ['active', 'inactive']);
            $table->enum('commentable', ['active', 'inactive']);
            $table->timestamps();
            $table->foreign('singer_id')->references('id')->on('singers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musics');
    }
};
