<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            (isBase('admins')) ? $table->id() : $table->unsignedBigInteger('id')->primary();
            $table->string('username');
            $table->string('name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('address')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('iban')->nullable();
            $table->string('mobile')->unique();
            $table->string('phone')->nullable();
            $table->string('national_code')->unique();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->boolean('block')->default(0);
            $table->timestamp('birth_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('admins');
    }
}
