<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports', compact('reports'));
    }

    public function search(Request $request)
    {
        $email = $request->input('email');
        $reports = Report::where('user_email', 'like', '%' . $email . '%')
                        ->orWhere('report_email', 'like', '%' . $email . '%')
                        ->get();
        return view('admin.reports', compact('reports'));
    }
}
