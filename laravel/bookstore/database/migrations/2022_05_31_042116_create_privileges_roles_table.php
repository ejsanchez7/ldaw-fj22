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
        Schema::create('privileges_roles', function (Blueprint $table) {
            
            $table->id();
            
            $table->foreignId("privilege_id")
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId("role_id")
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            //unique multivalor para asegurar la integridad referencial
            $table->unique(["privilege_id", "role_id"]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges_roles');
    }
};
