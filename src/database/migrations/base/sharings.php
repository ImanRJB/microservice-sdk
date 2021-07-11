<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sharings', function (Blueprint $table) {
            $table->increments('id');
            $table->string("terminal_website")->index();
            $table->string("iban_iban")->index();
            $table->string("percent");
            $table->timestamps();

          if(checkRelation('terminals')) {
            $table->foreign('terminal_website')
                ->references('website')
                ->on('terminals')
                ->onDelete('cascade')
                ->onUpdate('cascade');
	     }


           if(checkRelation('ibans')) {
            $table->foreign('iban_iban')
                ->references('iban')
                ->on('ibans')
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
        Schema::dropIfExists('sharings');
    }
}
