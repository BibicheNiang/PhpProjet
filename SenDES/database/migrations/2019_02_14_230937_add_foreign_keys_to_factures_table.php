<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFacturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('factures', function(Blueprint $table)
		{
			$table->foreign('abonnement_id')->references('id')->on('abonnements')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('factures', function(Blueprint $table)
		{
			$table->dropForeign('factures_abonnement_id_foreign');
		});
	}

}
