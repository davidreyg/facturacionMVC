<?php

namespace App\Http\Repositories;

use App\Models\Category;


/**
 * Class CategoryRepository
 * @package App\Repositories\V1
 * @version April 10, 2020, 7:21 pm -05
 */

class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Category::class;
    }
}
