<?php

namespace App\Repository\Room;

use App\Utility;
use App\Constant;
use Carbon\Carbon;
use App\Models\Room;
use App\ReturnMessage;
use App\Models\RoomAmenity;
use App\Models\RoomSpecialFeature;
use Illuminate\Support\Facades\DB;

class RoomRepository implements RoomRepositoryInterface
{
    public function postRoom($data)
    {
        $returnedObj = array();
            $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR; 
            DB::beginTransaction();
            try {
                $uniqueName               = Utility::getUploadImage($data['thumbnail']);
                $paraObj                  = new Room();
                $paraObj->name            = $data['name'];
                $paraObj->occupancy       = $data['occupancy'];
                $paraObj->size            = $data['size'];
                $paraObj->bed_id          = $data['bed_id'];
                $paraObj->view_id         = $data['view_id'];
                $paraObj->description     = $data['description'];
                $paraObj->detail          = $data['detail'];
                $paraObj->price_per_day   = $data['price_per_day'];
                $paraObj->extra_bed_price = $data['extra_bed_price'];
                $paraObj->thumbnail       = $uniqueName;
                $tempObj = Utility::addCreated($paraObj);
                $tempObj->save();
                $destination = public_path('assets/upload/' . $tempObj->id . '/thumb');
                if(!file_exists($destination)){
                    mkdir($destination, 0777, true);
                }
                Utility::cropResizeImage($data['thumbnail'],Constant::THUMB_WIDTH,Constant::THUMB_HEIGHT,$destination,$uniqueName);
                self::getRoomSpecialFeature($data['specialFeature'],$tempObj->id);
                self::getRoomAmenity($data['amenity'],$tempObj->id);
                DB::commit();
                $returnedObj['LaraHotelCode'] = ReturnMessage::OK;
                $returnedObj['insertedRoomId'] = $tempObj->id;
                return $returnedObj;
            } catch (\Exception $e) {
                $logs = "Room Create Error :: \n";
                $logs .= $e->getMessage();
                Utility::saveErrorLog($logs);
                DB::rollBack();
                $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
                return $returnedObj;
            }  
    }

    private static function getRoomSpecialFeature($specialFeatures, $roomId){
        foreach($specialFeatures as $specialFeature){
            $paraObj = new RoomSpecialFeature();
            $paraObj->room_id = $roomId;
            $paraObj->special_feature_id = $specialFeature;
            $tempObj = Utility::addCreated($paraObj);
            $tempObj->save();
        }
        return true;
    }
    private static function getRoomAmenity($amenities, $roomId){
        foreach($amenities as $amenity){
            $paraObj = new RoomAmenity();
            $paraObj->room_id = $roomId;
            $paraObj->amenity_id = $amenity;
            $tempObj = Utility::addCreated($paraObj);
            $tempObj->save();
        }
        return true;
    }

    public function listingRoom()
    {
        $Rooms = Room::SELECT("id", "name", "updated_at")
                ->whereNull("deleted_at")
                ->get();
        return $Rooms;
    }

    public function editRoom($id)
    {
        $Rooms = Room::find($id);
        return $Rooms;
    }

    public function updateRoom($data)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $id            = $data['id'];
            $name          = $data['name'];
            $paraObj       = Room::find($id);
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
    public function deleteRoom($id)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paraObj       = Room::find($id);
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
