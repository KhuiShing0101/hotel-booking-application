<?php

namespace App\Repository;

interface FrontEndRoomRepositoryInterface
{
    public function getRoomsByRandom();
    public function getAllRoom();
    public function detail(int $id);
}
