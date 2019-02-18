<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbonnementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abonnements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('contrat', 191);
			$table->date('date');
			$table->float('cumulAnc', 10, 0)->nullable()->default(0);
			$table->float('cumulNouv', 10, 0);
			$table->integer('compteur_id')->unsigned()->index('abonnements_compteur_id_foreign');
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
		Schema::drop('abonnements');
	}

}
