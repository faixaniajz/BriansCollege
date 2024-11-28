<?php

namespace App\Http\Controllers;

use App\Models\Walton;
use Illuminate\Http\Request;

class WaltonController extends Controller
{
    public function in()
    {
        $results = Walton::orderBy('id', 'desc')->paginate(200);
        
        return view('walton.index', compact('results'));
    }

    public function destroy($id)
    {
        $result = Walton::find($id);
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

        $result = Walton::findOrFail($id);
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

        return redirect()->route('walton.in')->with('success', 'Result updated successfully');
    }

    public function edit($id)
    {
        $result = Walton::findOrFail($id);
        return view('walton.update', compact('result'));
    }
}
