<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * 
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property bool $personal_team
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|TeamInvitation[] $team_invitations
 *
 * @package App\Models
 */
class Team extends Model
{
	protected $table = 'teams';

	protected $casts = [
		'user_id' => 'int',
		'personal_team' => 'bool'
	];

	protected $fillable = [
		'user_id',
		'name',
		'personal_team'
	];

	public function team_invitations()
	{
		return $this->hasMany(TeamInvitation::class);
	}
}
