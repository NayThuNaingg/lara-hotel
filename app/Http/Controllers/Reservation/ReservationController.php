<?php

namespace App\Http\Controllers\Reservation;

use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\Reservation\ReservationRepositoryInterface;

class ReservationController extends Controller
{
    private $ReservationRepository;
    public function __construct(ReservationRepositoryInterface $ReservationRepository)
    {
        $this->ReservationRepository = $ReservationRepository;
        DB::connection()->enableQueryLog();
    }
    public function ReservationListing()
    {
        try {
            $reservations = $this->ReservationRepository->getReservation();
            return view('backend.Reservation.reservationListing', compact(['reservations']));
        } catch (\Exception $e) {
            $logs = "Reservation sreen create::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
