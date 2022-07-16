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
        Schema::create('main_cats', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('image',255);
            $table->string('image_meta',255);
            $table->boolean('active')->default(true);
            $table->text('keywords_meta');
            $table->text('description_meta');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')
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
        Schema::dropIfExists('main_cats');
    }
};
