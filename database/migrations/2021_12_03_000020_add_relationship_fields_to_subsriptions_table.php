<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubsriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('subsriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('subscription_user_id');
            $table->foreign('subscription_user_id', 'subscription_user_fk_5492985')->references('id')->on('users');
        });
    }
}
