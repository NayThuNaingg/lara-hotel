<?php

namespace App\Repository\SpecialFeature;

interface SpecialFeatureRepositoryInterface
{
    public function postSpecialFeature($data);
    public function listingSpecialFeature();
    public function editSpecialFeature($id);
    public function updateSpecialFeature($data);
    public function deleteSpecialFeature($id);
    public function getSpecialFeatureByRoomId($roomId);
}
