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
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('nrc_id')->unique();
            $table->string('gender');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('relationship_id');
            $table->string('occuption');
            $table->string('education');
            $table->string('ethnicity_id');
            $table->string('nationality_id');
            $table->string('religion');
            $table->string('remark');
            $table->unsignedBigInteger('user_id');
            $table->string('house_hold_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            
            $table->foreign('house_hold_id')
                ->references('household_id')
                ->on('households')
                ->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
};
