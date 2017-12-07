<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\User;

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
          $table->string('alias',100)->unique();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('email',150)->unique();
          $table->string('password');
          $table->integer('role')->default(0);
          $table->rememberToken();
          $table->timestamps();
        });

        $admin= new User;
        $admin->alias='arya';
        $admin->first_name= 'Arya';
        $admin->last_name= 'Stark';
        $admin->email= 'arya@gmail.com';
        $admin->password = bcrypt('123456');//123456
        $admin->role = 1;
        $admin->save();

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
