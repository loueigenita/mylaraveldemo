<?php

namespace App\Repositories;

use App\Models\students;
use App\Repositories\BaseRepository;

/**
 * Class studentsRepository
 * @package App\Repositories
 * @version September 16, 2021, 1:19 pm UTC
*/

class studentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Firstname',
        'Middlename',
        'Lastname',
        'Birthdate',
        'Gender',
        'Address',
        'Citizenship',
        'Religion'
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
        return students::class;
    }
}
