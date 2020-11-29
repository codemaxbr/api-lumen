<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCustomFieldsOptionsTable.
 */
class CreateCustomFieldsOptionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('custom_fields_options', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('custom_field_id');
            $table->string('slug');
            $table->string('name');

            $table->foreign('custom_field_id')->references('id')->on('custom_fields')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('custom_fields_options');
	}
}
