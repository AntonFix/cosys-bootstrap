<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('dictionary_geos_id')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('postbox')->nullable();
            $table->string('opening_times')->nullable();

            $table->string('phone_1')->nullable();
            $table->string('phone_1_notices')->nullable();

            $table->string('phone_2')->nullable();
            $table->string('phone_2_notices')->nullable();

            $table->string('phone_3')->nullable();
            $table->string('phone_3_notices')->nullable();

            $table->string('email_1')->nullable();
            $table->string('email_1_notices')->nullable();

            $table->string('email_2')->nullable();
            $table->string('email_2_notices')->nullable();

            $table->string('email_3')->nullable();
            $table->string('email_3_notices')->nullable();

            $table->string('website')->nullable();

            $table->string('fin_naam_bank')->nullable();
            $table->string('fin_naam_persoon_of_organisatie')->nullable();
            $table->string('fin_iban_code')->nullable();
            $table->string('fin_bin_code')->nullable();
            $table->string('fin_bicc_code')->nullable();
            $table->string('fin_btw_nummer')->nullable();
            $table->string('fin_ondernemingsnummer')->nullable();
            $table->string('fin_opmerkingen')->nullable();

            $table->boolean('is_active')->default(1)->nullable();

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
        Schema::dropIfExists('addresses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('dictionary_geos_id')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('postbox')->nullable();
            $table->string('opening_times')->nullable();

            $table->string('phone_1')->nullable();
            $table->string('phone_1_notices')->nullable();

            $table->string('phone_2')->nullable();
            $table->string('phone_2_notices')->nullable();

            $table->string('phone_3')->nullable();
            $table->string('phone_3_notices')->nullable();

            $table->string('email_1')->nullable();
            $table->string('email_1_notices')->nullable();

            $table->string('email_2')->nullable();
            $table->string('email_2_notices')->nullable();

            $table->string('email_3')->nullable();
            $table->string('email_3_notices')->nullable();

            $table->string('website')->nullable();

            $table->string('fin_naam_bank')->nullable();
            $table->string('fin_naam_persoon_of_organisatie')->nullable();
            $table->string('fin_iban_code')->nullable();
            $table->string('fin_bin_code')->nullable();
            $table->string('fin_bicc_code')->nullable();
            $table->string('fin_btw_nummer')->nullable();
            $table->string('fin_ondernemingsnummer')->nullable();
            $table->string('fin_opmerkingen')->nullable();

            $table->boolean('is_active')->default(1)->nullable();

            $table->timestamps();
        });
    }
};
