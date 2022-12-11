<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakeTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->string('title');
            $table->string('discription')->nullable();
            $table->string('head1')->nullable();
            $table->string('head2')->nullable();
            $table->string('head3')->nullable();
            $table->string('head4')->nullable();
            $table->string('head5')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('tables',function (Blueprint $table){
            $table->dropForeign('tables_office_id_foreign');
        });
    }
}
