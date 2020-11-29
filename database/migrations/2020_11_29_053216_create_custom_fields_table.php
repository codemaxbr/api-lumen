<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCustomFieldsTable.
 */
class CreateCustomFieldsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('custom_fields', function(Blueprint $table) {
            $table->increments('id');
            $table->morphs('field');
            $table->string('type');
            $table->string('label');
            $table->string('slug');
            $table->boolean('required')->default(0);
            $table->timestamps();
            $table->integer('account_id')->unsigned();

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('custom_fields');
	}
}
