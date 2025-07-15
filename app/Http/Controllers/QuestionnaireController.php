<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    // Fetch all questions with answers (for admin panel)

    public function index()
    {
        $questions = Question::with('answers')->latest()->paginate(5); 
        return view('dashboard.questionnaire.index', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string',
            'type' => 'required|in:single,multiple',
            'answers' => 'required|array|min:2',
            'answers.*' => 'required|string',
        ]);

        $question = Question::create([
            'question_text' => $request->question_text,
            'type' => $request->type,
        ]);

        foreach ($request->answers as $answer) {
            Answer::create([
                'question_id' => $question->id,
                'answer_text' => $answer,
            ]);
        }

        return redirect()->route('questions')->with('message', 'Question added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question_text' => 'required|string',
            'type' => 'required|in:single,multiple',
            'answers' => 'required|array|min:2',
            'answers.*' => 'required|string',
        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'question_text' => $request->question_text,
            'type' => $request->type,
        ]);

        // Replace old answers
        $question->answers()->delete();
        foreach ($request->answers as $answer) {
            Answer::create([
                'question_id' => $question->id,
                'answer_text' => $answer,
            ]);
        }

        return redirect()->route('questions')->with('message', 'Question updated successfully!');
    }

    public function destroy($id)
    {

        $question = Question::findOrFail($id);
        $question->answers()->delete();
        $question->delete();

        return response()->json(['message' => 'Question deleted']);
    }
}
