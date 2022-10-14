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
        Schema::create('db_upsis', function (Blueprint $table) {
            $table->id();
            $table->string('upsinum');
            $table->integer('natureinfo_id');
            $table->string('legitmate');
            $table->integer('sender_id');
            $table->integer('recipienst_id');
            $table->string('sharingtype');
            $table->date('dateofshare')->nullable();
            $table->string('periodofshare')->nullable();
            $table->string('modeofsharing');
            $table->string('confidentiality');
            $table->date('effectivedate')->nullable();
            $table->text('descriptionagreement');
            $table->date('confintimatdate')->nullable();
            $table->text('purpose');
            $table->text('descriptioninfo');
            $table->text('remark');
            $table->text('dsctime');
            $table->integer('user_id')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('db_upsis');
    }
};
