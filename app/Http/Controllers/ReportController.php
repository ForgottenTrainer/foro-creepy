<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function reportUser(Request $request, $id)
    {
        $report = $request->validate([
            'reason' => "max:255"
        ]);

        $report = Report::create();
        $report->create([
            'user_id' => Auth::id(),
            'reported_user_id' => $id,
            'reason' => $request->input('reason'),
        ]);

        $report->save();

        return redirect()->back()->with('success', 'User reported successfully.');
    }

    public function reportPost(Request $request, $id)
    {
        Report::create([
            'user_id' => Auth::id(),
            'post_id' => $id,
            'reason' => $request->input('reason'),
        ]);

        return redirect()->back()->with('success', 'Post reported successfully.');
    }
}
