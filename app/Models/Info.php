<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 30 Jul 2019 04:44:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Info
 *
 * @property int $id
 * @property int $temp_id
 * @property string $hobby
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Info newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Info newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Info query()
 * @mixin \Eloquent
 */
class Info extends Eloquent
{
	protected $casts = [
		'temp_id' => 'int'
	];

	protected $fillable = [
		'temp_id',
		'hobby'
	];
}
