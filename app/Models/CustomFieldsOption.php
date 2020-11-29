<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class CustomFieldsOption.
 *
 * @package namespace App\Models;
 */
class CustomFieldsOption extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'custom_field_id'
    ];

    public function custom_field()
    {
        return $this->belongsTo(CustomField::class);
    }
}
