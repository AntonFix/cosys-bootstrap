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
        Schema::create('appointment_codes', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('details');
            $table->boolean('is_active')->default(1);

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
        Schema::dropIfExists('appointment_codes', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('details');
            $table->boolean('is_active')->default(1);

            $table->timestamps();
        });
    }
};
