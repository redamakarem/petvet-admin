<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMedicalHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('record_pet_id')->nullable();
            $table->foreign('record_pet_id', 'record_pet_fk_4920256')->references('id')->on('pets');
            $table->unsignedBigInteger('record_user_id')->nullable();
            $table->foreign('record_user_id', 'record_user_fk_4920257')->references('id')->on('users');
        });
    }
}
