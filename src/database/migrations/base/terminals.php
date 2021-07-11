<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminals', function (Blueprint $table) {
            (isBase('terminals')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('iban_iban')->index();
            $table->string('job_category_sub_code')->index()->nullable();
            $table->string('terminal')->unique();
            $table->string('name_fa');
            $table->string('name_en')->nullable();
            $table->string('phone');
            $table->string('ip')->nullable();
            $table->string('website')->unique();
            $table->float('wage_percent')->default(1);
            $table->string('max_wage')->default(4000);
            $table->string('settlement_period')->default('daily');
            $table->boolean('wage_payer')->default(0);
            $table->string('tax_payer_code')->nullable();
            $table->string('balance')->default(0);
            $table->string('logo')->nullable();
            $table->boolean('block')->default(0);
            $table->boolean('active')->default(0);
            $table->timestamp('rejected_at')->nullable();
            $table->string('reject_comment')->nullable();
            $table->timestamp('displayed_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('terminals');
    }
}
