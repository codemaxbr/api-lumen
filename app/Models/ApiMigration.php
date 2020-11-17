<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ApiMigration
 * 
 * @property int $id
 * @property string|null $name
 * @property int|null $batch
 * @property Carbon|null $migration_time
 *
 * @package App\Models
 */
class ApiMigration extends Model
{
	protected $table = 'api_migrations';
	public $timestamps = false;

	protected $casts = [
		'batch' => 'int'
	];

	protected $dates = [
		'migration_time'
	];

	protected $fillable = [
		'name',
		'batch',
		'migration_time'
	];
}
