<?php

namespace App\Repository\Reservation;

interface ReservationRepositoryInterface
{
    public function postReserve($data);
    public function getReservation();
    public function delete($id);

}
