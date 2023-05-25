<?php

namespace App\Repository;

interface BedRepositoryInterface
{
    public function insert($data);
    public function get();
    public function getAllBed();
    public function getBedById(int $id);
    public function update(array $data);
}