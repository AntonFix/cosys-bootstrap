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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();

            $table->string('forename')->nullable();
            $table->string('name')->nullable();

            $table->string('function')->nullable();

            $table->date('birthday')->nullable();
            $table->enum('sex', ['M', 'V', 'X'])->nullable();
            $table->boolean('volunteer')->default(0)->nullable();
            $table->boolean('oral_coach')->default(0)->nullable();
            $table->boolean('coordinator')->default(0)->nullable();
            $table->string('details')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('presence')->nullable();

            $table->date('active_from')->nullable();
            $table->date('inactive_from')->nullable();

            $table->boolean('is_active')->default(1)->nullable();

            $table->unsignedBigInteger('created_by_user_id')->nullable();

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
        Schema::dropIfExists('persons', function (Blueprint $table) {
            $table->id();

            $table->string('forename');
            $table->string('name');

            $table->string('function');

            $table->date('birthday');
            $table->enum('sex', ['M', 'V', 'X']);
            $table->boolean('volunteer')->default(0);
            $table->boolean('oral_coach')->default(0);
            $table->boolean('coordinator')->default(0);
            $table->string('details');
            $table->string('phone');
            $table->string('email');
            $table->string('presence');

            $table->date('active_from');
            $table->date('inactive_from');

            $table->boolean('is_active')->default(1);

            $table->unsignedBigInteger('created_by_user_id');

            $table->timestamps();
        });
    }
};
