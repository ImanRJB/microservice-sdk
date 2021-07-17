<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrankishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irankishes', function (Blueprint $table) {
            (isBase('irankishes')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->string('terminal_website')->index();
            $table->unsignedInteger('shaparak_request_id')->index()->nullable();
            $table->string('terminal')->nullable();
            $table->string('acceptor')->nullable();
            $table->string('acceptor_code')->nullable();
            $table->string('merchant_code')->nullable();
            $table->string('password')->nullable();
            $table->string('sha1')->nullable();
            $table->string('sha1_hex')->nullable();
            $table->string('account_number')->nullable();
            $table->string('mrs_username')->nullable();
            $table->longText('public_key')->nullable();
            $table->timestamp('psp_verified_at')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->default(0);
            $table->string('tracking_number')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->string('reject_comment')->nullable();
            $table->timestamps();

            if(checkRelation('terminals')) {
                $table->foreign('terminal_website')
                    ->references('website')
                    ->on('terminals')
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
        Schema::dropIfExists('irankishes');
    }
}
