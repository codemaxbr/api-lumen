<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomFieldRepository;
use App\Models\CustomField;
use App\Validators\CustomFieldValidator;

/**
 * Class CustomFieldRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CustomFieldRepositoryEloquent extends BaseRepository implements CustomFieldRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomField::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
