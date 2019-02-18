<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('mois', 191);
			$table->float('comsommation', 10, 0);
			$table->integer('prix');
			$table->boolean('reglement');
			$table->integer('abonnement_id')->unsigned()->index('factures_abonnement_id_foreign');
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
		Schema::drop('factures');
	}

}
