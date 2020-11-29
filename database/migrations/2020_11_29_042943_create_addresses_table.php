<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAddressesTable.
 */
class CreateAddressesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('address');
            $table->string('zipcode',10)->nullable()->comment('CEP');
            $table->string('address')->nullable()->comment('Endereço');
            $table->string('number',10)->nullable()->comment('Número');
            $table->string('uf', 10)->nullable()->comment('UF');
            $table->string('city',150)->nullable()->comment('Cidade');
            $table->string('district',150)->nullable()->comment('Bairro');
            $table->string('additional',150)->nullable()->comment('Complemento');
            $table->double('latitude', 13,8)->nullable();
            $table->double('longitude', 13,8)->nullable();
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
		Schema::drop('addresses');
	}
}
