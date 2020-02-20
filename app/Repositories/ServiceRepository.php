<?php

namespace App\Repositories;

use App\Contracts\ServiceRepositoryContract;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryContract
{
    /**
     * @var $model
     */
    private $model;

    /**
     * VehicleRepository constructor.
     * @param Service $model
     */
    public function __construct(Service $model)
    {
        $this->model = $model;
    }

    public function sumVehicleAmount(int $id)
    {
        return $this->model->where('vehicle_id', $id)->sum('total');
    }

    public function vehicleCreationDate($id)
    {
        return $this->model->where('vehicle_id', $id)->orderBy('created_at', 'ASC')->select('created_at')->first();
    }
}
