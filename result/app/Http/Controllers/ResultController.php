<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index()
    {
        return view('results.search');
    }

    public function search(Request $request)
    {
        $request->validate([
            'rollno' => 'required|integer',
            'branch' => 'required|string',
            'month' => 'required|string',
        ]);


        $tableName = '';

        switch ($request->branch) {
            case 'baghbanpura':
                $tableName = 'results';
                break;
            case 'queens':
                $tableName = 'branchq';
                break;
            case 'walton':
                $tableName = 'branchw';
                break;
            default:
                return redirect()->back()->with('error', 'Invalid branch selected.');
        }

        $result = DB::table($tableName)
            ->where('rollno', $request->rollno)
            ->where('month', $request->month)
            ->first();

        if (!$result) {
            return redirect()->back()->with('error', 'No result found for this roll number and branch.');
        }

        $totalMarks = $result->online + $result->assesment + $result->attendance;

        return view('results.show', compact('result', 'totalMarks'));
    }

    public function in()
    {
        $results = Result::orderBy('id', 'desc')->paginate(200);
        return view('index.index', compact('results'));
    }

    public function destroy($id)
    {
        $result = Result::find($id);
        $result->delete();
        return redirect()->back()->with('success', 'Result deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'stname' => 'required|string|max:255',
            'tname' => 'required|string|max:255',
            'cltime' => 'required|string|max:50',
            'course' => 'required|string|max:255',
            'assesment' => 'required|numeric',
            'attendance' => 'required|numeric',
            'online' => 'required|numeric',
            'month' => 'required|string|max:50',
        ]);

        $result = Result::findOrFail($id);
        $result->timestamps = false;
        $result->update([
            'stname' => $request->stname,
            'tname' => $request->tname,
            'cltime' => $request->cltime,
            'course' => $request->course,
            'assesment' => $request->assesment,
            'attendance' => $request->attendance,
            'online' => $request->online,
            'month' => $request->month,
        ]);

        return redirect()->route('results.in')->with('success', 'Result updated successfully');
    }

    public function edit($id)
    {
        $result = Result::findOrFail($id);
        return view('index.update', compact('result'));
    }
}
