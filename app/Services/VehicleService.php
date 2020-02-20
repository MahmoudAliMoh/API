<?php

namespace App\Services;

use App\Contracts\FuelEntryRepositoryContract;
use App\Contracts\InsurancePaymentRepositoryContract;
use App\Contracts\ServiceRepositoryContract;
use App\Contracts\VehicleRepositoryContract;
use App\Contracts\VehicleServiceContract;
use App\Contracts\VehicleTransformerContract;

class VehicleService implements VehicleServiceContract
{
    /**
     * @var $vehicleRepository
     */
    private $vehicleRepository;

    private $fuelEntryRepository;
    private $insurancePaymentRepository;
    private $serviceRepository;
    private $vehicleTransformer;

    private $vehicleTypes = ['service', 'fuelEntry', 'insurancePayment'];

    public function __construct(
        VehicleRepositoryContract $vehicleRepository,
        FuelEntryRepositoryContract $fuelEntryRepository,
        InsurancePaymentRepositoryContract $insurancePaymentRepository,
        ServiceRepositoryContract $serviceRepository,
        VehicleTransformerContract $vehicleTransformer
    )
    {
        $this->vehicleRepository = $vehicleRepository;
        $this->fuelEntryRepository = $fuelEntryRepository;
        $this->insurancePaymentRepository = $insurancePaymentRepository;
        $this->serviceRepository = $serviceRepository;
        $this->vehicleTransformer = $vehicleTransformer;
    }

    public function listVehiclesExpenses(array $fields)
    {
        $vehicles = $this->vehicleRepository->list($fields);
        foreach ($vehicles as $vehicle) {
            $amount = $this->sumVehicleAmount($vehicle->id);
            $this->vehicleTransformer->transformExpenses($vehicles, $this->getVehicleType($amount), $this->vehicleCreationDate($vehicle->id));
        }
    }

    public function sumVehicleAmount(int $id)
    {
        $service = $this->serviceRepository->sumVehicleAmount($id);
        $fuelEntry = $this->fuelEntryRepository->sumVehicleAmount($id);
        $insurancePayment = $this->insurancePaymentRepository->sumVehicleAmount($id);
        return $this->getVehicleType(['service' => $service, 'fuelEntry' => $fuelEntry, 'insurancePayment' => $insurancePayment]);
    }

    private function getVehicleType(array $types)
    {
        if ($types['service'] > $types['fuelEntry'] && $types['insurancePayment']) {
            return $this->vehicleTypes['service'];
        } elseif ($types['fuelEntry'] > $types['service'] && $types['insurancePayment']) {
            return $this->vehicleTypes['fuelEntry'];
        } elseif ($types['insurancePayment'] > $types['service'] && $types['fuelEntry']) {
            return $this->vehicleTypes['insurancePayment'];
        }
    }

    public function vehicleCreationDate(int $id)
    {
        $service = $this->serviceRepository->vehicleCreationDate($id);
        $fuelEntry = $this->fuelEntryRepository->vehicleCreationDate($id);
        $insurancePayment = $this->insurancePaymentRepository->vehicleCreationDate($id);

        $dates = ['service' => $service, 'fuelEntry' => $fuelEntry, 'insurancePayment' => $insurancePayment];
        return min($dates);
    }

}
