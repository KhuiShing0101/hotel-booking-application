<?php

namespace App\Repository;

interface ViewRepositoryInterface
{
    public function insert($data);
    public function get();
    public function getAllView();
    public function getViewByID(int $id);
    public function update(array $data);
}