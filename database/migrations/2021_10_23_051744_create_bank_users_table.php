<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 20);
            $table->string('lastname', 20)->nullable();
            $table->string('gender', 7)->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('phone', 14)->nullable();
            $table->string('email', 50);
            $table->string('userprofilepicture')->nullable();
            $table->string('nid', 15)->unique()->nullable();
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
        Schema::dropIfExists('bank_users');
    }
}
