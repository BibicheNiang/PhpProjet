<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Feb 2019 23:16:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Abonnement
 * 
 * @property int $id
 * @property string $contrat
 * @property \Carbon\Carbon $date
 * @property float $cumulAnc
 * @property float $cumulNouv
 * @property int $compteur_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Compteur $compteur
 * @property \Illuminate\Database\Eloquent\Collection $factures
 *
 * @package App\Models
 */
class Abonnement extends Eloquent
{
	protected $casts = [
		'cumulAnc' => 'float',
		'cumulNouv' => 'float',
		'compteur_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'contrat',
		'date',
		'cumulAnc',
		'cumulNouv',
		'compteur_id'
	];

	public function compteur()
	{
		return $this->belongsTo(\App\Models\Compteur::class);
	}

	public function factures()
	{
		return $this->hasMany(\App\Models\Facture::class);
	}
}
