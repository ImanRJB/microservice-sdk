<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_messages', function (Blueprint $table) {
            (isBase('ticket_messages')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->unsignedBigInteger('ticket_id')->index();
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->text('body');
            $table->string('attach')->nullable();
            $table->timestamps();
            $table->softDeletes();


            if(checkRelation('users')) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }

            if(checkRelation('tickets')) {
                $table->foreign('ticket_id')
                    ->references('id')
                    ->on('tickets')
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
        Schema::dropIfExists('ticket_messages');
    }
}
