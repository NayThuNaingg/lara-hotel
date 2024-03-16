<?php 
namespace App\Repository\View;

use App\Repository\View\ViewRepositoryInterface;

class ViewRepository implements ViewRepositoryInterface{
    public function postView($data){
        dd($data);
    }
}
