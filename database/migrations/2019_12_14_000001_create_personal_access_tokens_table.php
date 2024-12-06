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
        // Schema::create('news', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->text('description');
        //     $table->unsignedBigInteger('category_id');  // Add this line
        //     $table->string('image');
        //     $table->timestamps();
        
        //     // Add foreign key constraint if needed
        //     $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        // });

        Schema::table('news', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->change(); // If you want to allow nulls
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
