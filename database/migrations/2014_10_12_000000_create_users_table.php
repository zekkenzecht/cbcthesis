<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar')->default('dist/users/defaultavatar.png');
            $table->string('email')->unique();
            $table->mediumText('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('status')->default('for-activation');
            $table->enum('ministry,',
                [
                'NONE','CTSA','MISSIONS',
                'COMMUNICATION MEDIA DEPARTMENT',
                'CBC INTEGRATED SCHOOL',
                'CHILDREN MINISTRY',
                'MUSIC MINISTRY',
                'USHERING MINISTRY',
                'SINGLES PROFESSIONAL MINISTRY',
                'SPORTS AND RECREATION MINISTRY',
                'GOLDEN FOLKS MINISTRY',
                'QUAD MINISTRY',
                'PASTORAL CARE',
                'ASSIMILATION',
                'PRAYER MINISTRY',
                'YOUTH MINISTRY',
                'EVANGELISTIC BIBLE STUDIES',
                'EVANGELISTIC MINISTRY',
                'MEMBERSHIP MINISTRY',
                'DISCIPLESHIP CLASSES',
                'FACILITY MANAGEMENT'
                ])->default('NONE');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
