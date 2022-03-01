<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOrientationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orientations', function (Blueprint $table) {
            $table->string('controls_bg_orientation')->nullable();
            $table->string('controls_bg_from')->nullable();
            $table->string('controls_bg_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orientations', function (Blueprint $table) {
            $table->dropColumn(['controls_bg_orientation', 'controls_bg_from', 'controls_bg_to']);
        });
    }
}
