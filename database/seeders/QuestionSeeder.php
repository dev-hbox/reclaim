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
        // Sample questions and answers with points
        $questions = [
            [
                'question_text' => 'Primary Goal in Using This App',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Break free from porn addiction entirely', 'points' => 3],
                    ['text' => 'Reduce frequency and gain more control', 'points' => 2],
                    ['text' => 'Strengthen spiritual life while overcoming addiction', 'points' => 1],
                    ['text' => 'Seek community support and accountability', 'points' => 0],
                ]
            ],
            [
                'question_text' => 'Lifestyle',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Stress', 'points' => 1],
                    ['text' => 'Loneliness', 'points' => 1],
                    ['text' => 'Boredom', 'points' => 1],
                    ['text' => 'Habit', 'points' => 1],
                ]
            ],
            [
                'question_text' => 'How long have you struggled with this habit?',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Weak faith, unstructured time, screens for comfort', 'points' => 3],
                    ['text' => 'Growing faith, no routine, late-night media use', 'points' => 2],
                    ['text' => 'Regular prayer, busy life, some tempting content', 'points' => 1],
                    ['text' => 'Daily prayer, structured routine, minimal tempting media', 'points' => 0],
                ]
            ],
            [
                'question_text' => 'How Often Do You Typically Relapse?',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Multiple times per day', 'points' => 4],
                    ['text' => 'Daily', 'points' => 3],
                    ['text' => 'A few times a week', 'points' => 2],
                    ['text' => 'Weekly', 'points' => 1],
                    ['text' => 'Less than once a week', 'points' => 0],
                ]
            ],
            [
                'question_text' => 'Has Your Frequency Increased Over Time?',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Yes', 'points' => 2],
                    ['text' => 'No', 'points' => 0],

                ]
            ],
            [
                'question_text' => 'Do You Use Pornography to Cope with Stress, Loneliness, or Emotional Discomfort?',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Frequently', 'points' => 3],
                    ['text' => 'Occasionally', 'points' => 1],
                    ['text' => 'Never', 'points' => 0],

                ]
            ],
            [
                'question_text' => 'What Time of Day Do You Typically Experience the Most Temptation?',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Night', 'points' => 2],
                    ['text' => 'Evening', 'points' => 1],
                    ['text' => 'Afternoon', 'points' => 0],
                    ['text' => 'Morning', 'points' => 0],

                ]
            ],
            [
                'question_text' => 'Most Common Triggers',
                'type' => 'single',
                'answers' => [
                    ['text' => '1 point per trigger selected (Stress/Anxiety, Loneliness, Boredom, Social Media, Movies/TV Shows, Lack of Prayer/Spiritual Practice, Other)', 'points' => 1],
                    ['text' => 'Max: 7 points (if all selected)', 'points' => 7],

                ]
            ],
            [
                'question_text' => 'Who Knows About Your Struggle and Supports You?',
                'type' => 'single',
                'answers' => [
                    ['text' => 'No one—I’m doing this alone', 'points' => 3],
                    ['text' => 'A close friend or family member', 'points' => 2],
                    ['text' => 'A spiritual leader or mentor', 'points' => 1],
                    ['text' => 'A formal accountability partner or group', 'points' => 0],
                    ['text' => 'Other (specify)', 'points' => 1],

                ]
            ],
            [
                'question_text' => 'Has Pornography Negatively Affected Your Relationships?',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Yes, significantly', 'points' => 3],
                    ['text' => 'Somewhat', 'points' => 2],
                    ['text' => 'Not much', 'points' => 1],
                    ['text' => 'No impact', 'points' => 0],
                ]
            ],
            [
                'question_text' => 'How Often Do You Feel Like Pornography Is Holding You Back from Your Full Potential?',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Almost always', 'points' => 3],
                    ['text' => 'Often', 'points' => 2],
                    ['text' => 'Sometimes', 'points' => 1],
                    ['text' => 'Rarely', 'points' => 0],
                ]
            ],
            [
                'question_text' => 'Have You Experienced Any Sexual Dysfunctions (e.g., ED or Difficulty with Arousal)?',
                'type' => 'single',
                'answers' => [
                    ['text' => 'Yes', 'points' => 2],
                    ['text' => 'Not', 'points' => 2],
                    ['text' => 'No', 'points' => 0],
                ]
            ],
        ];

        // Insert questions and answers with points
        foreach ($questions as $q) {
            $question = Question::create([
                'question_text' => $q['question_text'],
                'type' => $q['type'],
            ]);

            foreach ($q['answers'] as $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answer['text'],
                    'points' => $answer['points'],
                ]);
            }
        }
    }
}
