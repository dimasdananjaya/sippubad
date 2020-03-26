<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->bigIncrements('id_prodi');
            $table->string('prodi')->unique();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->unsignedBigInteger('id_prodi');

            $table->string('name');
            $table->string('nim')->unique();
            
            $table->string('password');
            $table->string('angkatan');
            $table->string('acs');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('nim_verified_at')->nullable();

            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');
        });

        Schema::create('biaya_prodi', function (Blueprint $table) {
            $table->bigIncrements('id_biaya');
            $table->unsignedBigInteger('id_prodi');
            $table->decimal('jumlah_biaya',7,3);
            $table->string('jenis_biaya')->unique();

            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');
        });

        Schema::create('periode', function (Blueprint $table) {
            $table->bigIncrements('id_periode');
            $table->string('periode')->unique();
            $table->timestamps();
        });

        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_periode');
            $table->unsignedBigInteger('id_prodi');

            $table->string('no_referensi');
            $table->decimal('jumlah_bayar',7,3);
            $table->string('semester');
            $table->string('validated_by');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_periode')->references('id_periode')->on('periode');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');
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
