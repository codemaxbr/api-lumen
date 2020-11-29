<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class CustomField.
 *
 * @package namespace App\Models;
 */
class CustomField extends Model
{
    protected $fillable = [
        'type',
        'label',
        'slug',
        'required',
        'account_id'
    ];

    public function field()
    {
        return $this->morphTo();
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
