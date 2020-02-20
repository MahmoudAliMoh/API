<?php

namespace App\Contracts;

interface VehicleServiceContract
{
    public function listVehiclesExpenses(array $fields);

    public function sumVehicleAmount(int $id);

    public function vehicleCreationDate(int $id);
}
