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
        Schema::table('services', function (Blueprint $table) {
            $table->float('price')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->string('kategori')->nullable()->change();
            $table->string('pembimbing')->nullable();
            $table->text('rincian')->nullable();
            $table->dropColumn('short_description');
            $table->dropColumn('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('short_description');
            $table->string('stock');
            $table->float('price')->change();
            $table->text('description')->change();
            $table->string('image')->change();
            $table->string('kategori')->change();
        });
    }
};
