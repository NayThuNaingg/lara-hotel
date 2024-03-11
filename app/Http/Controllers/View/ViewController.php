<?php

namespace App\Http\Controllers\View;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use GuzzleHttp\RetryMiddleware;
use App\Http\Controllers\Controller;
use App\Repository\View\ViewRepositoryInterface;

class ViewController extends Controller
{
    protected $viewRepository;
    public function __construct(ViewRepositoryInterface $viewRepository)
    {
        $this->viewRepository = $viewRepository;
    }
    public function viewForm()
    {
        return view('backend.view.viewForm');
    }
    public function postView(Request $request)
    {
        try {
            $result = $this->viewRepository->postView($request->all());
            $logs = "View sreen create::";
            Utility::saveDebugLog($logs);
            if($result['LaraHotelCode'] == ReturnMessage::OK) {
                return redirect()->route('viewListing')->with('success', 'Create Data successful.');
            } else {
                return redirect()->route('viewListing')->with('error', 'Something wrong.');

            }
        } catch(\Exception $e) {
            $logs = "View sreen create::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }

    public function viewListing()
    {
        try {
            $view_data = $this->viewRepository->getViewListing();
            $logs = "View screen Listing::";
            Utility::saveDebugLog($logs);
            return view('backend.view.viewListing', compact(['view_data']));
        } catch(\Exception $e) {
            $logs = "View screen Listing::";
            $logs = $e->getMessage();
            Utility::saveErrorLog($logs);
            abort(500);
        }
    }
}
