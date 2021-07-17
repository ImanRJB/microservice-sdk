<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            (isBase('tickets')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('department_id')->index();
            $table->string('title');
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();


            if(checkRelation('users')) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }

            if(checkRelation('departments')) {
                $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            }
        });

        DB::update("ALTER TABLE tickets AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
