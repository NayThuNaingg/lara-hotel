<?php

namespace App\Repository\View;

interface ViewRepositoryInterface
{
    public function postView($data);
    public function listingView();
    public function editView($id);
    public function updateView($data);
    public function deleteView($id);
}
