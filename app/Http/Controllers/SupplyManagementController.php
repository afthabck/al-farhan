<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Inertia\Inertia;

class SupplyManagementController extends Controller
{
     public function index()
    {
        return Inertia::render('SupplyManagement/Index',);
    }
}
