<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address.
 *
 * @package namespace App\Models;
 */
class Address extends Model
{
    protected $table = 'addresses';

    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
    ];

    protected $fillable = [
        'address',
        'number',
        'uf',
        'city',
        'district',
        'additional',
        'zipcode',
        'latitude',
        'longitude'
    ];

    public function address()
    {
        return $this->morphTo();
    }
}
