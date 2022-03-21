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
        Schema::table('babies', function (Blueprint $table) {

            $table->renameColumn("birthDate","birth_date");
            $table->renameColumn("deathDate","death_date");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('babies', function (Blueprint $table) {

            $table->renameColumn("birth_date",'birthDate');
            $table->renameColumn("death_date","deathDate");

        });
    }
};
