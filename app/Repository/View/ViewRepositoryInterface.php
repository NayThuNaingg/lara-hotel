<?php

namespace App\Repository\View;

interface ViewRepositoryInterface
{
    public function postView($data);
    public function viewListing();
    public function viewEdit($id);
    public function viewUpdate($data);
    public function viewDelete($id);
}
