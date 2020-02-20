<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * One to many relation between Vehicle and Fuel entry.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fuelEntry()
    {
        return $this->hasMany(FuelEntry::class);
    }

    /**
     * One to many relation between Vehicle and Insurance payment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function insurancePayment()
    {
        return $this->hasMany(InsurancePayment::class);
    }

    /**
     * One to many relation between Vehicle and Service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
