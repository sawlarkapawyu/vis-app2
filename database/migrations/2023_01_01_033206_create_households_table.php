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
        Schema::create('households', function (Blueprint $table) {
            $table->string('household_id')->uniqid();
            $table->date('date');
            $table->string('house_number')->uniqid();
            $table->string('family_head');
            $table->unsignedBigInteger('state_region_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('township_id');
            $table->unsignedBigInteger('ward_village_tract_id');
            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            $table->timestamps();
            
            $table->primary('household_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('state_region_id')
                ->references('id')
                ->on('state_regions')
                ->onDelete('cascade');
            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onDelete('cascade');
            $table->foreign('township_id')
                ->references('id')
                ->on('townships')
                ->onDelete('cascade');
            $table->foreign('ward_village_tract_id')
                ->references('id')
                ->on('ward_village_tracts')
                ->onDelete('cascade');
            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
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
        Schema::dropIfExists('households');
    }
};
