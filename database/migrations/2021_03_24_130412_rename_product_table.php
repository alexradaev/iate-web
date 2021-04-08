<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('product_models', 'products');
        DB::statement('ALTER TABLE products ALTER COLUMN description TYPE text;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('products')){
            DB::statement('ALTER TABLE products ALTER COLUMN description TYPE character varying (255);');
        }
        Schema::rename('products', 'product_models');
    }
}
