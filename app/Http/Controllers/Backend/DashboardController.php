<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $pagePath = 'backend.pages.';

    public function index()
    {
        return view($this->pagePath . 'dashboard.index');
    }
}
