<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->unsignedBiginteger('dept_id');
            $table->foreign('dept_id')->references('id')->on('departments');
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
        Schema::dropIfExists('admin_members');
    }
}
