<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * 
 * @property int $id
 * @property string|null $name_business
 * @property string|null $uuid
 * @property string|null $logo
 * @property string|null $domain
 * @property bool|null $status
 * @property int $reseller_id
 * @property Carbon|null $expires
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Reseller $reseller
 * @property Collection|Contact[] $contacts
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Account extends Model
{
	protected $table = 'accounts';

	protected $casts = [
		'status' => 'bool',
		'reseller_id' => 'int'
	];

	protected $dates = [
		'expires'
	];

	protected $fillable = [
		'name_business',
		'uuid',
		'logo',
		'domain',
		'status',
		'reseller_id',
		'expires'
	];

	public function reseller()
	{
		return $this->belongsTo(Reseller::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
