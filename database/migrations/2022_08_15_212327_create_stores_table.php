<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('store_name');
            $table->string('kana');
            $table->string('area');
            $table->string('store_address');
            $table->string('genre1');
            $table->string('genre2')->nullable();
            $table->string('genre3')->nullable();
            $table->string('genre4')->nullable();
            $table->string('genre5')->nullable();
            $table->string('genre6')->nullable();
            $table->string('genre7')->nullable();
            $table->string('genre8')->nullable();
            $table->string('regular_holiday')->nullable();
            $table->string('business_hours')->nullable();
            $table->char('store_phone_number')->nullable();
            $table->longText('outside_photo');
            $table->longText('inside_photo');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
