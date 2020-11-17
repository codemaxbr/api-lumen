<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ApiMigrationsLock
 * 
 * @property int $index
 * @property int|null $is_locked
 *
 * @package App\Models
 */
class ApiMigrationsLock extends Model
{
	protected $table = 'api_migrations_lock';
	protected $primaryKey = 'index';
	public $timestamps = false;

	protected $casts = [
		'is_locked' => 'int'
	];

	protected $fillable = [
		'is_locked'
	];
}
