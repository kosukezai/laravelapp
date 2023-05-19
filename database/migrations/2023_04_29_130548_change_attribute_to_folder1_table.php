<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Types\Type;

Type::addType('char', 'Doctrine\DBAL\Types\StringType');

class ChangeAttributeToFolder1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('folder1', function (Blueprint $table) {
            $table->char('two_name')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('folder1', function (Blueprint $table) {
            //
        });
    }
}
