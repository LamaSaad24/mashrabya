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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image',255);
            $table->string('image_meta',255);
            $table->longText('content');
            $table->enum('active',['1','0'])->default('1');
            $table->enum('deleted',['1','0'])->default('0');
            $table->text('keywords_meta');
            $table->text('description_meta');
            $table->text('tags');
            $table->enum('addedBy',['admin','blogger']);
            $table->foreignId('blogger_id')->nullable()->constrained('bloggers')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('sub_cat_id')->constrained('sub_cats')->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('blogs');
    }
};
