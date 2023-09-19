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
        Schema::create('comments', function (Blueprint $table) {
           $table->id();
            $table->string('comment', 150);
            $table->tinyInteger('evaluation');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('from_user_id')->constrained('users'); 
            $table->foreignId('to_user_id')->constrained('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
