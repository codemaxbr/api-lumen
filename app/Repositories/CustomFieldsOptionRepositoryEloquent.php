<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomFieldsOptionRepository;
use App\Models\CustomFieldsOption;
use App\Validators\CustomFieldsOptionValidator;

/**
 * Class CustomFieldsOptionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CustomFieldsOptionRepositoryEloquent extends BaseRepository implements CustomFieldsOptionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomFieldsOption::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
