<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThumbToComicsTable extends Migration
{
    public function up()
{
    Schema::table('comics', function (Blueprint $table) {
        $table->string('thumb')->after('description');
    });
}


public function down()
{
    Schema::table('comics', function (Blueprint $table) {
        $table->dropColumn('thumb');
    });
}
}