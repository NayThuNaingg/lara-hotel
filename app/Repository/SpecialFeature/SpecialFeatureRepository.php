<?php

namespace App\Repository\SpecialFeature;

use App\Utility;
use Carbon\Carbon;
use App\ReturnMessage;
use App\Models\SpecialFeature;
use App\Models\RoomSpecialFeature;

class SpecialFeatureRepository implements SpecialFeatureRepositoryInterface
{
    public function postSpecialFeature($data)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paraObj       = new SpecialFeature();
            $paraObj->name = $data['name'];
            $tempObj       = Utility::addCreated($paraObj);
            $tempObj->save();
            $returnedObj['LaraHotelCode'] = ReturnMessage::OK;
            return $returnedObj;
        } catch (\Exception $e) {
            $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }
    }

    public function listingSpecialFeature()
    {
        $SpecialFeatures = SpecialFeature::SELECT("id", "name", "updated_at")
                ->whereNull("deleted_at")
                ->get();
        return $SpecialFeatures;
    }

    public function editSpecialFeature($id)
    {
        $SpecialFeatures = SpecialFeature::find($id);
        return $SpecialFeatures;
    }

    public function updateSpecialFeature($data)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $id            = $data['id'];
            $name          = $data['name'];
            $paraObj       = SpecialFeature::find($id);
            $paraObj->name = $name;
            $tempObj       = Utility::addUpdate($paraObj);
            $tempObj->save();
            $returnedObj['LaraHotelCode'] = ReturnMessage::OK;
            return $returnedObj;
        } catch (\Exception $e) {
            $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }

    }
    public function deleteSpecialFeature($id)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paraObj       = SpecialFeature::find($id);
            $tempObj       = Utility::addDelete($paraObj);
            $tempObj->save();
            $returnedObj['LaraHotelCode'] = ReturnMessage::OK;
            return $returnedObj;
        } catch (\Exception $e) {
            $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }

    }

    public function getSpecialFeatureByroomId($roomId)
    {
        $specialFeatureData = [];
        $data = RoomSpecialFeature::SELECT("special_feature_id")
                ->WHERE("room_id", $roomId)
                ->whereNull("deleted_at")
                ->get();
        foreach($data as $specialFeature) {
            array_push($specialFeatureData, $specialFeature->special_feature_id);
        }
        return $specialFeatureData;

    }

}
