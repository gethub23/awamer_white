<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('complaint')->nullable();

            $table -> unsignedBigInteger( 'user_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'user_id' ) -> references( 'id' ) -> on( 'users' )-> onDelete( 'cascade' );

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
        Schema::dropIfExists('complaints');
    }
}
