<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();

            $table->string('profile_picture')->default('img/default.png');

            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('telephone')->nullable();
            $table->string('birthdate')->nullable();

            $table->string('created_by')->nullable();
            $table->boolean('verified')->default(1);
            $table->boolean('is_active')->default(1);
            $table->string('password')->nullable();
            $table->longText('qr_data')->nullable();
            $table->boolean('accepted_terms')->default(0);
            $table->softDeletes();
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
}
