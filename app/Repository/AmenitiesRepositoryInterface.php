<?php

namespace App\Repository;

interface AmenitiesRepositoryInterface
{
    public function insert($data);
    public function getAmenitiesByType(int $type);
}