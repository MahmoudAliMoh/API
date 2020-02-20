<?php

namespace App\Transformers;

use App\Contracts\VehicleTransformerContract;

class VehicleExpensesTransformer implements VehicleTransformerContract
{
    public function transformExpenses($vehicles, $type, $creationDate)
    {
        dd($vehicles);
    }
}
