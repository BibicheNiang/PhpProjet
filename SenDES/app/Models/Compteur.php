<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Feb 2019 23:16:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Compteur
 * 
 * @property int $id
 * @property string $numero
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $abonnements
 *
 * @package App\Models
 */
class Compteur extends Eloquent
{
	protected $fillable = [
		'numero'
	];

	public function abonnements()
	{
		return $this->hasMany(\App\Models\Abonnement::class);
	}
}
