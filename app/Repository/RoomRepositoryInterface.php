<?php

namespace App\Repository;

interface RoomRepositoryInterface
{
    public function insert(array $data);
    public function insertRoomGallery(int $id, $imageName);

    public function getAllRoom();
    public function getThumbnailByRoomId(int $id);
    public function getRoomGalleryByRoomId(int $id);
    public function getRoomGalleryUpdateByRoomId(int $id);

    public function updateRoomGallery(array $data, $dbImage);
    public function thumbUpdate(int $id, $thumbName);

}
