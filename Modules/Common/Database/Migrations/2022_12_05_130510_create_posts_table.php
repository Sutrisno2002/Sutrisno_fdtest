<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->unique()->index();
            $table->string('slug_title')->unique()->index();
            $table->string('type')->default('blog')->nullable();
            $table->string('author')->nullable();
            $table->string('thumbnail');
            $table->longText('description')->nullable();
            // $table->text('tags')->nullable();
            $table->string('reading_time')->nullable(); // 2.16 word/sec (average)
            $table->bigInteger('number_of_views')->default(0);
            $table->bigInteger('number_of_shares')->default(0);
            $table->char('created_by', 8)->nullable();
            $table->char('published_by', 8)->nullable();
            $table->dateTime('published_at')->nullable();
            $table->dateTime('archived_at')->default(null)->nullable();
            $table->tinyInteger('rating')->nullable(); // Rating 1-5

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
