<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumerLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_logs', function (Blueprint $table) {
            (isBase('consumer_logs')) ? $table->id() : $table->unsignedBigInteger('id')->primary();
            $table->string('queue');
            $table->string('model');
            $table->string('method');
            $table->json('data');
            $table->longText('exception')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('consumer_logs');
    }
}
