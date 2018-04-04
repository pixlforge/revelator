<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use CS_REST_Subscribers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignMonitorController extends Controller
{
    /**
     * Store a new subscription to Campaign Monitor using the user's details.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $auth = ['api_key' => config('app.campaign_monitor.api_key')];

        $wrap = new CS_REST_Subscribers(config('app.campaign_monitor.subscriber_list_id'), $auth);

        $result = $wrap->add([
            'EmailAddress' => $request->email,
            'Name' => $request->full_name,
            'CustomFields' => [
                [
                    'Key' => 'First Name',
                    'Value' => $request->first_name
                ],
                [
                    'Key' => 'Program',
                    'Value' => $request->program
                ],
                [
                    'Key' => 'Date Added',
                    'Value' => Carbon::now()->format('Y/m/d')
                ],
                [
                    'Key' => 'Revelator',
                    'Value' => 1
                ]
            ],
            'Resubscribe' => true
        ]);

        $result = json_encode($result);

        return response($result, 200);
    }
}
