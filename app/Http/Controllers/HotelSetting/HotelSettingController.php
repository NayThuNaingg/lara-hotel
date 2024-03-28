<?php

namespace App\Http\Controllers\HotelSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\HotelSetting\HotelSettingRepositoryInterface;

class HotelSettingController extends Controller
{
    protected $hotelSettingRepository;
    public function __construct(HotelSettingRepositoryInterface $hotelSettingRepository)
    {
        $this->hotelSettingRepository = $hotelSettingRepository;
    }

    public function editHotelSetting()
    {
        $hotelSettings    = $this->hotelSettingRepository->editHotelSetting();
        if($hotelSettings == null) {
            abort(404);
        }
        return view('backend.HotelSetting.hotelsettingForm', compact(['hotelSettings']));
    }
}
