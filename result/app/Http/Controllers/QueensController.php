<?php

namespace App\Http\Controllers;

use App\Models\Queens;
use Illuminate\Http\Request;

class QueensController extends Controller
{
    public function in()
    {
        $results = Queens::orderBy('id', 'desc')->paginate(200);
        
        return view('queens.index', compact('results'));
    }

    public function destroy($id)
    {
        $result = Queens::find($id);
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

        $result = Queens::findOrFail($id);
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

        return redirect()->route('queens.in')->with('success', 'Result updated successfully');
    }

    public function edit($id)
    {
        $result = Queens::findOrFail($id);
        return view('queens.update', compact('result'));
    }
}
