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
        Schema::create('helpfuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('testimonial_id');
            $table->boolean('is_helpful')->default(false);
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreign('testimonial_id')->references('id')->on('testimonials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hepfull');
    }
};
