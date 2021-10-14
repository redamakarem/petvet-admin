<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPetsTable extends Migration
{
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_type_id');
            $table->foreign('pet_type_id', 'pet_type_fk_4919888')->references('id')->on('pettypes');
            $table->unsignedBigInteger('pet_gender_id');
            $table->foreign('pet_gender_id', 'pet_gender_fk_4919920')->references('id')->on('pet_genders');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_5105219')->references('id')->on('users');
        });
    }
}
