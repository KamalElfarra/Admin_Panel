<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Parse\ParseClient;

class Controller extends BaseController
{

    public function __construct()
    {

        $app_id = 'kauhtaadfWScvR4awsLoa98MngafcEqa';
        $master_key = 'mNh6G87Jk9adfgCwNhQapMntY6acva7C';
        ParseClient::initialize($app_id, null, $master_key);
        ParseClient::setServerURL('http://142.202.190.37:1337', '/parse');
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
