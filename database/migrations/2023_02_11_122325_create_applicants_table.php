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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->string('resume')->nullable()->default(null);
            $table->text('education')->nullable()->default(null);
            $table->text('experience')->nullable()->default(null);
            $table->text('skills')->nullable()->default(null);
            $table->text('certifications')->nullable()->default(null);
            $table->text('information')->nullable()->default(null);
            $table->text('location')->nullable()->default(null);
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
        Schema::dropIfExists('applicants');
    }
};
