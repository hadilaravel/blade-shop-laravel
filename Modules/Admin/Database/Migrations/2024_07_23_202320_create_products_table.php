<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('introduction');
            $table->string('slug')->unique();
            $table->text('image');
            $table->text('weight', 10, 2);
            $table->text('length', 10, 1)->comment('cm unit');
            $table->text('width', 10, 1)->comment('cm unit');
            $table->text('height', 10, 1)->comment('cm unit');
            $table->decimal('price', 20, 3);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('marketable')->default(1)->comment('1 => marketable, 0 => is not marketable');
            $table->integer('sold_number')->default(0)->comment('چند تا فروخته');
            $table->integer('frozen_number')->default(0)->comment('تعداد رزو شده');
            $table->integer('marketable_number')->default(0)->comment('چند تا قابل فروشه');
            $table->foreignId('brand_id')->constrained('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('product_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
