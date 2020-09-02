<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\Fernanda;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use Fernanda, DispatchesJobs, ValidatesRequests;
}
