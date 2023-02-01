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
        Schema::create('debugs', function (Blueprint $table) {
            $table->id();

            $table->string('nameString');
            $table->char('nameChar', 100);
            $table->integer('integer')->nullable();
            $table->decimal('decimal')->nullable();

            $table->boolean('boolean')->nullable();

            $table->float('float', 8, 2)->nullable();
            $table->double('double', 8, 2)->nullable();
            $table->dateTime('dateTime')->nullable();
            $table->date('date')->nullable();
            $table->enum('enum', ['item1', 'item2', 'item3'])->nullable();
            $table->uuid('uuidColumn')->nullable();
            $table->year('year')->nullable();
            $table->json('json')->nullable();
            $table->foreignId('foreignId')->nullable();
            $table->string('uploadedFile')->nullable();

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
        Schema::dropIfExists('debugs');

    }
};
