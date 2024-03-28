<?php

namespace App\Repository\Room;

interface RoomRepositoryInterface
{
    public function postRoom($data);
    public function listingRoom();
    public function editRoom($id);
    public function updateRoom($data);
    public function deleteRoom($id);
    public function roomSpecialFeatureByroomId($id);
    public function roomAmenityByroomId($id);
}
