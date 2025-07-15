<?php

namespace App\Http\Controllers;

use App\Models\DailyAffirmative;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AffirmationController extends Controller
{
    public function index()
    {
        $affirmations = DailyAffirmative::orderBy('show_date', 'desc')->get(); // or 'asc'
        return view('dashboard.affirmatives.index', compact('affirmations'));
    }

    public function storeAffirm(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'show_date' => 'required|date',
        ]);

        try {
            $parsedDate = Carbon::parse($request->show_date)->format('Y-m-d');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['show_date' => 'Invalid date format']);
        }

        DailyAffirmative::create([
            'title' => $request->title,
            'description' => $request->description,
            'show_date' => $parsedDate,
        ]);

        return redirect()->back()->with('success', 'Affirmation added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'show_date' => 'required|date',
        ]);

        DailyAffirmative::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'show_date' => $request->show_date,
        ]);

        return redirect()->back()->with('success', 'Affirmation updated successfully.');
    }

    public function affirmDelete($id)
    {
        $affirm = DailyAffirmative::find($id);

        if (!$affirm) {
            return redirect()->back()->with('danger', 'Affirmation not found.');
        }

        $affirm->delete();

        return redirect()->back()->with('success', 'Affirmation deleted successfully.');
    }
}
