<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Feb 2019 23:16:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Facture
 * 
 * @property int $id
 * @property string $mois
 * @property float $comsommation
 * @property int $prix
 * @property bool $reglement
 * @property int $abonnement_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Abonnement $abonnement
 *
 * @package App\Models
 */
class Facture extends Eloquent
{
	protected $casts = [
		'comsommation' => 'float',
		'prix' => 'int',
		'reglement' => 'bool',
		'abonnement_id' => 'int'
	];

	protected $fillable = [
		'mois',
		'comsommation',
		'prix',
		'reglement',
		'abonnement_id'
	];

	public function abonnement()
	{
		return $this->belongsTo(\App\Models\Abonnement::class);
	}
}
