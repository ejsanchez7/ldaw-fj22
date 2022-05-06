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
        Schema::create('books', function (Blueprint $table) {
            
            $table->id();
            $table->string("isbn",13);
            $table->string("title",255);
            $table->text("summary")->nullable();
            $table->integer("year");
            $table->string("edition",10);
            $table->decimal("price",7,2);
            $table->string("cover",255);
            $table->foreignId("publisher_id")->constrained()->onDelete("cascade");
            $table->foreignId("language_id");
            $table->timestamps();

            //Configuración explícita de llaves foráneas
            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->onDelete("cascade");

            //Índice único para el ISBN
            $table->unique("isbn");

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
