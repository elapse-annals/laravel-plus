<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Reliese\Database\Eloquent\Model;

/**
 * Class PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property Carbon $created_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereToken($value)
 * @mixin \Eloquent
 */
class PasswordReset extends Model
{
	protected $table = 'password_resets';
	public $incrementing = false;
	public $timestamps = false;

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'email',
		'token'
	];
}
