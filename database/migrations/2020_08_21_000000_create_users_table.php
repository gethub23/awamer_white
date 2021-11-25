<?php

use App\Models\User;
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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('country_code')->default('+966');
            $table->string('phone')->unique();
            $table->string('phoneNumber')->unique();
            $table->string('password');
            $table->string('image', 50)->default('default.png');
            $table->string('device_id')->nullable();
            $table->longText('token')->default('');
            $table->boolean('active')->default(0);
            $table->boolean('block')->default(0);
            $table->boolean('approved')->default(1);
            $table->string('lang', 2)->default('ar');
            $table->boolean('is_notify')->default(true);
            $table->string('code', 10)->nullable();
            $table->dateTime('code_expire')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
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
