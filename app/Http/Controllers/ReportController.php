<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Program;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        $reports = Report::latest()->get();

        return response()->json([
            'data' => $reports,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'program_id' => 'required|integer',
            'title' => 'required|unique:reports',
            'severity' => 'required|in:Critical,High,Medium,Low,None',
            'status' => 'required|in:New,Resolved',
        ]);

        $program = Program::find($request->program_id);

        if (!$program) {
            return response()->json([
                'error' => 'Program not found.',
            ], 404);
        }

        $validatedData['user_id'] = $request->user()->id;

        $report = Report::create($validatedData);

        $report->load('program');
        $report->load('user');

        return response()->json($report);
    }

    public function show(Report $report)
    {
        $report->load('program');

        return response()->json($report);
    }

    public function showByUser(Request $request, $report_id)
    {
        $report = Report::where('id', $report_id)->where('user_id', $request->user()->id)->first();

        if (!$report) {
            return response()->json([
                'error' => 'Report not found in this user.',
            ], 404);
        }

        return response()->json([
            'data' => $report,
        ]);
    }
    public function showAllByUser(Request $request)
    {
        $reports = Report::latest()->where('user_id', $request->user()->id)->get();

        return response()->json([
            'data' => $reports,
        ]);
    }

    public function update(Request $request, Report $report)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:reports,title,' . $report->id,
            'severity' => 'required|in:Critical,High,Medium,Low,None',
            'status' => 'required|in:New,Resolved',
        ]);

        $report->update($validatedData);

        $report->load('program');

        return response()->json($report);
    }

    public function destroy($id)
    {
        $report = Report::find($id);

        if (!$report) {
            return response()->json(['error' => 'Report not found.'], 404);
        }

        $report->delete();

        return response()->json(['message' => 'Report deleted successfully.']);
    }

}