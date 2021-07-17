<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShaparakTaxRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shaparak_tax_requests', function (Blueprint $table) {
            (isBase('shaparak_tax_requests')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('tracking_number');
            $table->string('follow_code')->nullable();
            $table->json('request_body')->nullable();
            $table->json('request_response')->nullable();
            $table->string('error_message')->nullable();
            $table->integer('error_status')->nullable();
            $table->integer("status_id")->nullable();
            $table->boolean('shahkar_valid')->nullable();
            $table->string('tpr_id')->nullable();
            $table->timestamps();


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
        Schema::dropIfExists('shaparak_tax_requests');
    }
}
