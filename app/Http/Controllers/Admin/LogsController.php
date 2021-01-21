<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Log;

class LogsController extends Controller
{
    public function index()
    {
        $logs = Log::orderBy('created_at', 'DESC')->get();

        return view('admin.logs.index', ['logs' => $logs]);
    }
}
