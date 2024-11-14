<?php
namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

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
            'month' => 'required|string',  
        ]);
        $result = Result::where('rollno', $request->rollno)
                        ->where('month', $request->month)
                        ->first();

        if (!$result) {
            return redirect()->back()->with('error', 'No result found for this roll number and month.');
        }
        $totalMarks = $result->online + $result->assesment + $result->attendance;

        return view('results.show', compact('result', 'totalMarks'));
    }
}
