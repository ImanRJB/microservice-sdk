<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('dashboard_charts', function (Blueprint $table) {
            (isBase('dashboard_charts')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->string('terminal_website')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->json('weekly_count')->nullable();
            $table->json('weekly_count_old')->nullable();
            $table->json('weekly_amount')->nullable();
            $table->json('weekly_amount_old')->nullable();
            $table->json('monthly_count')->nullable();
            $table->json('monthly_count_old')->nullable();
            $table->json('monthly_amount')->nullable();
            $table->json('monthly_amount_old')->nullable();


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
        Schema::dropIfExists('dashboard_charts');
    }
}
