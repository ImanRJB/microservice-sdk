<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            (isBase('users')) ? $table->id() : $table->unsignedBigInteger('id')->index()->unique();
            $table->string('mobile')->unique();
            $table->string('first_name_fa')->nullable();
            $table->string('last_name_fa')->nullable();
            $table->string('father_name_fa')->nullable();
            $table->string('first_name_en')->nullable();
            $table->string('last_name_en')->nullable();
            $table->string('father_name_en')->nullable();
            $table->string('national_code')->unique()->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->boolean('gender')->nullable();
            $table->boolean('user_type')->default(0);

            $table->timestamp('register_date')->nullable();
            $table->string('register_number')->nullable();
            $table->string('com_name_fa')->nullable();
            $table->string('com_name_en')->nullable();
            $table->string('national_legal_code')->nullable();
            $table->string('commercial_code')->nullable();
            $table->string('tax_payer_code')->nullable();

            $table->boolean('residency_type')->default(0);
            $table->boolean('vital_status')->default(0);
            $table->string('birth_crtfct_number')->nullable();
            $table->string('birth_crtfct_serial')->nullable();
            $table->integer('birth_crtfct_series_letter')->nullable();
            $table->string('birth_crtfct_series_number')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('national_card_image')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('block')->default(0);
            $table->integer('otp')->nullable();

            $table->string('national_card_photo')->nullable();
            $table->string('kyc_photo')->nullable();
            $table->string('introduction_photo')->nullable();

            $table->timestamp('otp_expired_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->longText('reject_description')->nullable();
            $table->timestamp('profile_verified_at')->nullable();
            $table->timestamp('shaparak_verified_at')->nullable();
            $table->timestamp('register_submitted_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
