<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAbonnementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('abonnements', function(Blueprint $table)
		{
			$table->foreign('compteur_id')->references('id')->on('compteurs')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('abonnements', function(Blueprint $table)
		{
			$table->dropForeign('abonnements_compteur_id_foreign');
		});
	}

}
