<?php

namespace App\Repository\View;

interface ViewRepositoryInterface
{
    public function postView($data);
    public function getViewListing();
}
