<?php

namespace App\Repository\View;

use App\Utility;
use App\ReturnMessage;
use App\Models\View;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

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

    public function viewListing()
    {
        $views = View::SELECT("id", "name", "updated_at")
                ->whereNull("deleted_at")
                ->get();
        return $views;
    }

    public function viewEdit($id)
    {
        $views = View::find($id);
        return $views;
    }

    public function viewUpdate($data)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $id            = $data['id'];
            $name          = $data['name'];
            $paraObj       = View::find($id);
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
    public function viewDelete($id)
    {
        $returnedObj = array();
        $returnedObj['LaraHotelCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $paraObj       = View::find($id);
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
