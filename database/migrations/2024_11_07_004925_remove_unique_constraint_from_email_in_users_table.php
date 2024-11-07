<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueConstraintFromEmailInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['email']); // Menghapus constraint unik
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique()->change(); // Mengembalikan constraint unik jika dibutuhkan
        });
    }
}

