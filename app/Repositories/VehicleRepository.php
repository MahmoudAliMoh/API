<?php

namespace App\Repositories;

use App\Contracts\VehicleRepositoryContract;
use App\Models\Vehicle;

class VehicleRepository implements VehicleRepositoryContract
{
    /**
     * @var Vehicle
     */
    private $model;

    /**
     * VehicleRepository constructor.
     * @param Vehicle $model
     */
    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }


    /**
     * List all vehicles with custom fields to return.
     *
     * @param array $fields
     * @return Mixed
     */
    public function list(array $fields)
    {
        return $this->model->select($fields)->get();
    }
}
