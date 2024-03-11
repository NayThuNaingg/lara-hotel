<?php

namespace App\Repository\View;

use App\Utility;
use App\ReturnMessage;
use App\Models\View;

class ViewRepository implements ViewRepositoryInterface
{
    public function postView($data)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paraObj       = new View();
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
    public function getViewListing()
    {
        $view = View::SELECT("id", "name")
                ->whereNull("deleted_at")
                ->get();
        return $view;
    }

}
