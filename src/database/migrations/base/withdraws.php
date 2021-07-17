<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            (isBase('withdraws')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->string('terminal_website')->index()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->string('payment_id')->unique();
            $table->string('reference_no')->nullable();
            $table->string('wage_amount');
            $table->string('amount');
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('uploaded_at')->nullable();
            $table->integer('status')->nullable();
            $table->longText('note')->nullable();
            $table->json('ibans');
            $table->softDeletes();
            $table->timestamps();

            if(checkRelation('terminals')) {
                $table->foreign('terminal_website')
                    ->references('website')
                    ->on('terminals')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
            }

            if(checkRelation('users')) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null')
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
        Schema::dropIfExists('withdraws');
    }
}
