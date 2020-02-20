<?php

namespace App\Repositories;

use App\Contracts\FuelEntryRepositoryContract;
use App\Models\FuelEntry;

class FuelEntryRepository implements FuelEntryRepositoryContract
{
    /**
     * @var $model
     */
    private $model;

    /**
     * VehicleRepository constructor.
     * @param FuelEntry $model
     */
    public function __construct(FuelEntry $model)
    {
        $this->model = $model;
    }

    public function sumVehicleAmount(int $id)
    {
        return $this->model->where('vehicle_id', $id)->sum('cost');
    }

    public function vehicleCreationDate($id)
    {
        return $this->model->where('vehicle_id', $id)->orderBy('entry_date', 'ASC')->select('entry_date')->first();
    }
}
