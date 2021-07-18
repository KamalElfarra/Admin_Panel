<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Parse\ParseClient;

class ExtendsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
