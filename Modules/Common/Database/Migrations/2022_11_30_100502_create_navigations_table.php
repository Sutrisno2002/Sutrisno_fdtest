<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('url');
            $table->string('icon')->nullable();
            $table->string('active_state')->default('active')->nullable();
            $table->string('module')->comment('Eg. Administrator, Front, Core');
            $table->string('placement')->comment('Eg. Header, Navbar, Footer');
            $table->unsignedBigInteger('sort_order');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('navigations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigations');
    }
}