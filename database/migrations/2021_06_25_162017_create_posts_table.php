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
            $table->id();
            $table->string('title', 200); 
            $table->string('subtitle', 500)->nullable();
            $table->text('content');
            $table->string('author', 50);
            $table->string('slug', 220)->unique();
            $table->date('pub_date');
            $table->string('image', 500);
            $table->smallInteger('inHome')->nullable()->unique();
            $table->unsignedBigInteger('categories_id')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
