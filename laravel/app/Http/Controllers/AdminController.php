<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the Admin Dashboard.
     */
    public function index(): View
    {
        // For now, we just return the view.
        return view('admin.dashboard');
    }
}