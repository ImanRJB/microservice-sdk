<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notifications', function (Blueprint $table) {
            (isBase('user_notifications')) ? $table->id() : $table->unsignedBigInteger('id')->primary();
            $table->unsignedInteger('user_id')->index();
            $table->boolean('ticket_sms')->default(0);
            $table->boolean('ticket_email')->default(0);
            $table->boolean('transaction_sms')->default(0);
            $table->boolean('transaction_email')->default(0);
            $table->boolean('withdraw_sms')->default(0);
            $table->boolean('withdraw_email')->default(0);
            $table->integer('balance')->default(10000);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('user_notifications');
    }
}
