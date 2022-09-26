<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOfficeColumnInfomation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infomations', function (Blueprint $table) {
            $table->unsignedBigInteger('office_id')->nullable();

            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infomations', function (Blueprint $table) {
            $table->dropForeign('infomations_office_id_foreign');
            $table->dropColumn('office_id');
        });
    }
}
