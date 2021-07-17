<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShaparakTerminalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shaparak_terminal_requests', function (Blueprint $table) {
            (isBase('shaparak_terminal_requests')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->unsignedBigInteger('user_id')->index();
            $table->string("terminal_website")->index();
            $table->string('tracking_number');
            $table->string('shaparak_tracking_number')->nullable();
            $table->json('request_body');
            $table->json('request_response')->nullable();
            $table->json('error')->nullable();
            $table->integer('status')->nullable();
            $table->boolean('success')->nullable();
            $table->timestamps();


            if(checkRelation('users')) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }

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
        Schema::dropIfExists('shaparak_terminal_requests');
    }
}
