<?php

namespace App\Repositories;

use App\Contracts\InsurancePaymentRepositoryContract;
use App\Models\InsurancePayment;

class InsurancePaymentRepository implements InsurancePaymentRepositoryContract
{
    /**
     * @var $model
     */
    private $model;

    /**
     * VehicleRepository constructor.
     * @param InsurancePayment $model
     */
    public function __construct(InsurancePayment $model)
    {
        $this->model = $model;
    }

    public function sumVehicleAmount(int $id)
    {
        return $this->model->where('vehicle_id', $id)->sum('amount');
    }

    public function vehicleCreationDate($id)
    {
        return $this->model->where('vehicle_id', $id)->orderBy('contract_date', 'ASC')->select('contract_date')->first();
    }
}
