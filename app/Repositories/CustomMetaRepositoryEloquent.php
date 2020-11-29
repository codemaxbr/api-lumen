<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomMetaRepository;
use App\Models\CustomMeta;
use App\Validators\CustomMetaValidator;

/**
 * Class CustomMetaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CustomMetaRepositoryEloquent extends BaseRepository implements CustomMetaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomMeta::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
