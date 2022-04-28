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
        Schema::create('authors_books', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId("author_id")->constrained()->onDelete("cascade");
            $table->foreignId("book_id")->constrained()->onDelete("cascade");
            //$table->timestamps();

            //Índice unique que garantice la integridad referencial N:N
            $table->unique(["author_id","book_id"]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors_books');
    }
};
