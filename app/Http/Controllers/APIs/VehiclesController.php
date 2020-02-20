<?php

namespace App\Http\Controllers\APIs;

use App\Contracts\VehicleServiceContract;
use App\Http\Controllers\Controller;

class VehiclesController extends Controller
{
    /**
     * @var $vehicleService
     */
    private $vehicleService;

    public function __construct(VehicleServiceContract $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function vehicleExpensesList()
    {
        return $this->vehicleService->listVehiclesExpenses(['id', 'name', 'plate_number']);
    }
}
