<?php

namespace App\Contracts;

interface VehicleTypesContract
{
    public function sumVehicleAmount(int $id);

    public function vehicleCreationDate($id);
}
