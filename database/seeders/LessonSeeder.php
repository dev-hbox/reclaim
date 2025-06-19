<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rec = [
            [
                'title' => 'Lesson 01',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
                'avatar' => '/uploads/lesson/user-default.png'

            ],
            [
                'title' => 'Lesson 02',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
                'avatar' => '/uploads/lesson/user-default.png'

            ],
            [
                'title' => 'Lesson 03',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
                'avatar' => '/uploads/lesson/user-default.png'

            ],
            [
                'title' => 'Lesson 04',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
                'avatar' => '/uploads/lesson/user-default.png'

            ],
            [
                'title' => 'Lesson 05',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
                'avatar' => '/uploads/lesson/user-default.png'

            ],

        ];

        foreach ($rec as $key => $value) {
            $lesson = Lesson::create([
                'title' => $value['title'],
                'description' => $value['description'],
                'avatar' => $value['avatar'],
            ]);
        }
    }
}
