<?php


namespace App\Services;

use App\Services\CustomLogServiceInterface as ServicesCustomLogServiceInterface;
use CustomLogServiceInterface;

class CustomLogDbService implements ServicesCustomLogServiceInterface
{
    protected $queryBuilder;

    public function __construct($queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function rotateLogs()
    {
        $this->queryBuilder->where('id', '<', 1000)->delete();
    }
}
