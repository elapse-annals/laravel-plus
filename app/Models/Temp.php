<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 09 Jun 2019 16:16:38 +0000.
 */

namespace App\Models;

/**
 * Class Temp
 *
 * @property int $id
 * @property string $name
 * @property int $sex
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Temp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Temp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Temp query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Temp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Temp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Temp whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Temp whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Temp whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Temp extends Model
{
    protected $casts = [
        'sex' => 'int'
    ];

    protected $fillable = [
        'name',
        'sex'
    ];

    public function info()
    {
        return $this->hasOne('App\Models\Info');
    }
}
