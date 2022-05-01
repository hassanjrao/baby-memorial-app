<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('babies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string("image")->nullable();

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('relationship')->nullable();

            $table->string("gender");
            $table->string("twin_multiple");

            $table->date("birthDate");
            $table->date("deathDate");

            $table->text("story")->nullable();
            $table->text("user_name")->nullable();
            $table->text("note")->nullable();
            $table->bigInteger("view_count")->nullable();

            $table->boolean("in_tshirts")->default(0)->comment("1 = yes, 0 = no");

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
        Schema::dropIfExists('babies');
    }
};
