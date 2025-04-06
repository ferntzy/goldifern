<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->id();
$table->string('username')->unique();
$table->string('first_name');
$table->string('last_name');
$table->string('email')->unique();
$table->string('password');
$table->timestamps();

    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->id();
$table->string('username')->unique();
$table->string('first_name');
$table->string('last_name');
$table->string('email')->unique();
$table->string('password');
$table->timestamps();

    });
}

};
