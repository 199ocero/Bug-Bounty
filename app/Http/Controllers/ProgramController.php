<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();

        return response()->json([
            'data' => $programs,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:programs',
            'pentesting_start_date' => 'required|date_format:Y-m-d H:i:s',
            'pentesting_end_date' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $validatedData['user_id'] = $request->user()->id;

        $program = Program::create($validatedData);

        return response()->json([
            'message' => 'Program created successfully.',
            'data' => $program,
        ], 201);
    }

    public function show($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'error' => 'Program not found.',
            ], 404);
        }

        $program->load('user');
        $program->load('report');

        return response()->json([
            'data' => $program,
        ]);
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'error' => 'Program not found',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|unique:programs',
            'pentesting_start_date' => 'required|date_format:Y-m-d H:i:s',
            'pentesting_end_date' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $program->update($validatedData);

        $program->load('report');

        return response()->json([
            'message' => 'Program updated successfully.',
            'data' => $program,
        ]);
    }

    public function destroy($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'error' => 'Program not found.',
            ], 404);
        }

        $program->delete();

        return response()->json([
            'message' => 'Program deleted successfully.',
        ]);
    }
}