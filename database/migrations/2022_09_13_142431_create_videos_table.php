<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('class');
            $table->string('subject');
            $table->string('teacher_name');
            $table->foreignId('edited_by')->references('user_id')->on('work_logs');
            $table->enum('is_recorded', ['0', '1']);
            $table->enum('is_edited', ['0', '1']);
            $table->enum('is_released', ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
