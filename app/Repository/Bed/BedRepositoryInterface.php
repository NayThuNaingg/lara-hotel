<?php

namespace App\Repository\Bed;

interface BedRepositoryInterface
{
    public function postBed($data);
    public function listingBed();
    public function editBed($id);
    public function updateBed($data);
    public function deleteBed($id);
}
