<?php

use App\Models\Project;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            // $table->foreign('project_id')
            //     ->constrained()
            //     ->references('id')->on('projects')
            //     ->onDelete('cascade');
            $table->foreignIdFor(Project::class);
            $table->string('assign_to');
            $table->boolean('completed')->default(0); // 0 - on_progress, 1 - completed
            $table->longText('todo');
            $table->date('deadline');
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
        Schema::dropIfExists('tasks');
    }
};
