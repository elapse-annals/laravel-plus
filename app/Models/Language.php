<?php

namespace App\Models;

use App\Models\Base\Language as BaseLanguage;

class Language extends BaseLanguage
{
	protected $fillable = [
		'key_word',
		'code',
		'key_value',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
