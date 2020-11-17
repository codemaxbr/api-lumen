<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reseller
 * 
 * @property int $id
 * @property string|null $name
 * @property int|null $account_id
 * 
 * @property Collection|Account[] $accounts
 *
 * @package App\Models
 */
class Reseller extends Model
{
	protected $table = 'resellers';
	public $timestamps = false;

	protected $casts = [
		'account_id' => 'int'
	];

	protected $fillable = [
		'name',
		'account_id'
	];

	public function accounts()
	{
		return $this->hasMany(Account::class);
	}
}
