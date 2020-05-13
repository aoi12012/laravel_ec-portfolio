<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_details', function (Blueprint $table) {
            $table->string('item_id', 16);
            $table->string('name');
            $table->string('name_kana');
            $table->string('thumbnail');
            $table->integer('category_id')->nullable(true);
            $table->integer('maker_id')->nullable(true);
            $table->integer('base_price');
            $table->integer('tax_free_fg')->nullable(true);
            $table->string('volume')->nullable(true);
            $table->text('description')->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(true);
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
        Schema::dropIfExists('item_details');
    }
}
