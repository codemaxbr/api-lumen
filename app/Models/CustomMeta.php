<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class CustomMeta.
 *
 * @package namespace App\Models;
 */
class CustomMeta extends Model
{
    protected $fillable = [
        'value',
        'custom_field_id'
    ];

    public function meta()
    {
        return $this->morphTo();
    }

    public function custom_field()
    {
        return $this->belongsTo(CustomField::class);
    }
}
