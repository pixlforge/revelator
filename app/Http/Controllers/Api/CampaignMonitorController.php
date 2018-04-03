<?php

namespace App\Http\Controllers\Api;

use CS_REST_Subscribers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignMonitorController extends Controller
{
    public function store(Request $request)
    {
        $auth = ['api_key' => config('app.campaign_monitor.api_key')];

        $wrap = new CS_REST_Subscribers(config('app.campaign_monitor.subscriber_list_id'), $auth);

        $result = $wrap->add([
            'EmailAddress' => $request->email,
            'Name' => $request->name,
            'Resubscribe' => true
        ]);

        $result = json_encode($result);

        return response($result, 200);
    }
}
