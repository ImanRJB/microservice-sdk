<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            (isBase('balances')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->string('terminal_website')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('transaction_request_id')->index()->unique();
            $table->integer('amount');
            $table->integer('old_balance');
            $table->integer('new_balance');
            $table->longText('description')->nullable();
            $table->boolean('type');
            $table->timestamps();

            if(checkRelation('terminals')) {
                $table->foreign('terminal_website')
                    ->references('website')
                    ->on('terminals')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }

            if(checkRelation('users')) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balances');
    }
}
