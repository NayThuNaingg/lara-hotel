<?php

namespace App\Repository\Bed;

interface BedRepositoryInterface
{
    public function postBed($data);
    public function bedListing();
    public function bedEdit($id);
    public function bedUpdate($data);
    public function bedDelete($id);
}
