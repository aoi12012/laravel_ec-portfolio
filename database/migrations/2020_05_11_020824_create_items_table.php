<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->string('item_id');
            $table->string('jancode13', 13)->nullable(true);
            $table->string('jancode8', 8)->nullable(true);
            $table->string('name');
            $table->string('name_kana');
            $table->string('thumbnail');
            $table->integer('category_id')->nullable(true);
            $table->integer('maker_id')->nullable(true);
            $table->integer('base_price');
            $table->integer('tax_free_fg')->nullable(true);
            $table->string('volume')->nullable(true);
            $table->text('description')->nullable(true);
            $table->timestamps();
            $table->primary('item_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
