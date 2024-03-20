<?php

namespace App\Repository\Amenity;

interface AmenityRepositoryInterface
{
    public function postAmenity($data);
    public function listingAmenity();
    public function editAmenity($id);
    public function updateAmenity($data);
    public function deleteAmenity($id);
    public function getAmenityByRoomID($roomId);
}
