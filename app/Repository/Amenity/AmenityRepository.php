<?php

namespace App\Repository\Amenity;

use App\Utility;
use App\ReturnMessage;
use App\Models\Amenity;
use Carbon\Carbon;

class AmenityRepository implements AmenityRepositoryInterface
{
    public function postAmenity($data)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paraObj       = new Amenity();
            $paraObj->name = $data['name'];
            $paraObj->type = $data['type'];
            $tempObj       = Utility::addCreated($paraObj);
            $tempObj->save();
            $returnedObj['LaraHotelCode'] = ReturnMessage::OK;
            return $returnedObj;
        } catch (\Exception $e) {
            $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }
    }

    public function listingAmenity()
    {
        $Amenitys = Amenity::SELECT("id", "name",'type', "updated_at")
                ->whereNull("deleted_at")
                ->get();
        return $Amenitys;
    }

    public function editAmenity($id)
    {
        $Amenitys = Amenity::find($id);
        return $Amenitys;
    }

    public function updateAmenity($data)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $id            = $data['id'];
            $name          = $data['name'];
            $type          = $data['type'];
            $paraObj       = Amenity::find($id);
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
    public function deleteAmenity($id)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paraObj       = Amenity::find($id);
            $tempObj       = Utility::addDelete($paraObj);
            $tempObj->save();
            $returnedObj['LaraHotelCode'] = ReturnMessage::OK;
            return $returnedObj;
        } catch (\Exception $e) {
            $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnedObj;
        }

    }

}
