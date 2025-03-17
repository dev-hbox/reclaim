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
        $questions = Question::with('answers')->get();
        return view('Admin.Quotes.show', compact('questions'));
    }

    public function addQuestion()
    {
        return view('Admin.Quotes.add');
    }


    // Admin adds a new question with multiple-choice answers
    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string',
            'type' => 'required|in:single,multiple',
            'answers' => 'required|array|min:2',
            'answers.*' => 'required|string'
        ]);

        try {
            // Create the question
            $question = Question::create([
                'question_text' => $request->question_text,
                'type' => $request->type,
            ]);

            // Add answers
            foreach ($request->answers as $answer_text) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answer_text,
                ]);
            }
            return redirect()->route('admin.achievements')->with(['message' => 'Question and answers added successfully!']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Get a specific question
    public function show($id)
    {
        $question = Question::with('answers')->findOrFail($id);
        return response()->json($question);
    }

    // Admin updates a question
    public function update(Request $request, $id)
    {
        $request->validate([
            'question_text' => 'sometimes|string',
            'type' => 'sometimes|in:single,multiple',
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->only(['question_text', 'type']));

        return response()->json([
            'message' => 'Question updated successfully!',
            'question' => $question,
        ]);
    }

    // Admin deletes a question (and its answers)
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json(['message' => 'Question deleted successfully!']);
    }
}
