<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ContactContactRepository;
use App\Models\ContactContact;
use App\Validators\ContactContactValidator;

/**
 * Class ContactContactRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ContactContactRepositoryEloquent extends BaseRepository implements ContactContactRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ContactContact::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
