<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample questions and answers
        $questions = [
            [
                'question_text' => 'What is your main goal?',
                'type' => 'single',
                'answers' => ['Quit porn completely', 'Reduce consumption', 'Improve mental health']
            ],
            [
                'question_text' => 'What triggers your cravings?',
                'type' => 'single',
                'answers' => ['Stress', 'Loneliness', 'Boredom', 'Habit']
            ],
            [
                'question_text' => 'How long have you struggled with this habit?',
                'type' => 'single',
                'answers' => ['Less than a year', '1-3 years', 'More than 3 years']
            ]
        ];

        // Insert questions and answers
        foreach ($questions as $q) {
            $question = Question::create([
                'question_text' => $q['question_text'],
                'type' => $q['type'],
            ]);

            foreach ($q['answers'] as $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answer,
                ]);
            }
        }
    }
}
