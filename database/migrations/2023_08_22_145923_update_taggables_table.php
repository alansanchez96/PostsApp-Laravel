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
        Schema::table('taggables', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->nullable()->change();
            $table->dropForeign(['tag_id']);
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taggables', function (Blueprint $table) {
            $table->dropForeign(['tag_id']);
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags');
            $table->unsignedBigInteger('tag_id')->change();
        });
    }
};
