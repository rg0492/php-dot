<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->integer('college_id');
            $table->string('title')->nullable();
            $table->string('contact_number',50)->nullable();
            $table->string('email')->nullable();
            $table->string('price')->default(0);
            $table->string('levels')->nullable();
            $table->string('description')->nullable();
            $table->string('syllabus',50)->nullable();
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
        Schema::dropIfExists('classes');
    }
}
