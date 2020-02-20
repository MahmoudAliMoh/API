<?php

namespace App\Contracts;

interface VehicleTransformerContract
{
    public function transformExpenses($vehicles, $type, $creationDate);
}
