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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['male', 'female']);
            $table->date('birthday');
            $table->string('contact');
            $table->string('address');
            $table->string('photo')->nullable();
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->foreignId('role_id')->references('id')->on('roles');
            $table->enum('contract_status', ['active', 'inactive']);
            $table->date('contract_start_date');
            $table->date('contract_end_date');
            $table->integer('hourly_rate');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
