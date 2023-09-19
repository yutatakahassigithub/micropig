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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('owner');
            $table->string('picture', 500)->nullable();
            $table->string('explain', 300)->nullable();
            $table->enum('area', ['east', 'west', 'islands'])->nullable();
            $table->string('sns', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['owner', 'picture', 'explain', 'area', 'sns']);
        });
    }

};
