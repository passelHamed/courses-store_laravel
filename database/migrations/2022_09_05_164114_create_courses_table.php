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
        Schema::create('Courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('cover_image');
            $table->decimal('price' , 8 , 2);
            $table->unsignedBigInteger('publish_year')->nullable();
            $table->unsignedBigInteger('number_of_videos')->nullable();
            $table->unsignedBigInteger('number_of_hours')->nullable();
            $table->unsignedBigInteger('explainer_id')->nullable();
            $table->timestamps();

            $table->foreign('Explainer_id')
            ->references('id')
            ->on('explainers')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
