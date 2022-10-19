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
        Schema::create('db_expires', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable(); 
            $table->string('lastname')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('password')->nullable(); 
            $table->text('registerdate')->nullable(); 
            $table->text('expirationdate')->nullable(); 
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
        Schema::dropIfExists('db_expires');
    }
};
