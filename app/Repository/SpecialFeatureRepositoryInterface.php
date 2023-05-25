<?php

namespace App\Repository;

interface SpecialFeatureRepositoryInterface
{
    public function insert($data);
    public function get();
    public function getAllSpecialFeature();
    public function getSpecialFeatureById(int $id);
    public function update(array $data);
}
