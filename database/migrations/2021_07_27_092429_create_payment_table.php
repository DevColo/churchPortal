<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tithe', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('month');
            $table->string('amount');
            $table->unsignedBiginteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->unsignedBiginteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('users');
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
        Schema::dropIfExists('tithe');
    }
}
