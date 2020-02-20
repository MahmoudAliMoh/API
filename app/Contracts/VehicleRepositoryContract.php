<?php

namespace App\Contracts;

interface VehicleRepositoryContract
{
    /**
     * List all vehicles with custom fields to return.
     *
     * @param $fields
     */
    public function list(array $fields);
}
