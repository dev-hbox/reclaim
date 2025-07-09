<?php

namespace App\Http\Controllers;

use App\Models\DailyAffirmative;
use Illuminate\Http\Request;

class AffirmationController extends Controller
{
    public function index()
    {
        $affirmations = DailyAffirmative::all();
        return view('dashboard.affirmatives.index', compact('affirmations'));
    }

    public function create()
    {
        return view('admin.affirmations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'show_date' => 'required|date',
        ]);

        DailyAffirmative::create($request->all());

        return redirect()->route('affirmations.index')->with('success', 'Affirmation created successfully.');
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
