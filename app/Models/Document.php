<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Document.
 *
 * @package namespace App\Models;
 */
class Document extends Model
{
    protected $fillable = [
        'description',
        'url',
        'account_id'
    ];

    public function document()
    {
        return $this->morphTo();
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
