<?php 
use App\Models\HotelSetting;
if(!function_exists('getSiteSetting')){
    function getSiteSetting() {
        $siteSetting = HotelSetting::first();
        return $siteSetting;
    }
}
