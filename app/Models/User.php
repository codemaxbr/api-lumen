<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property boolean|null $photo
 * @property bool|null $confirmed
 * @property bool|null $is_reseller
 * @property bool|null $is_owner
 * @property string|null $password_token
 * @property Carbon|null $password_token_expires
 * @property string|null $phone
 * @property int|null $account_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Account|null $account
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'photo' => 'boolean',
		'confirmed' => 'bool',
		'is_reseller' => 'bool',
		'is_owner' => 'bool',
		'account_id' => 'int'
	];

	protected $dates = [
		'password_token_expires'
	];

	protected $hidden = [
		'password',
		'password_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'photo',
		'confirmed',
		'is_reseller',
		'is_owner',
		'password_token',
		'password_token_expires',
		'phone',
		'account_id'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}
}
