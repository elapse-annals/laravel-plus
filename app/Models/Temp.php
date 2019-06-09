<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 09 Jun 2019 16:16:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Temp
 * 
 * @property int $id
 * @property string $name
 * @property int $sex
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Temp extends Eloquent
{
	protected $casts = [
		'sex' => 'int'
	];

	protected $fillable = [
		'name',
		'sex'
	];
}
