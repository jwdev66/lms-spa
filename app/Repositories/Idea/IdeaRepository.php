<?php

namespace App\Repositories\Idea;

use App\Models\Idea\Idea;
use App\Repositories\BaseRepository;

/**
 * Class IdeaRepository
 * @package App\Repositories\Idea
 * @version September 25, 2019, 9:58 pm UTC
 */
class IdeaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'title',
        'description',
        'type',
        'slug',
        'categories'
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
        return Idea::class;
    }
}
