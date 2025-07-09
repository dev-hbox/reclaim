<?php

namespace Database\Seeders;

use App\Models\DailyAffirmative;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DailyAffirmationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $affirmations = [
            [
                'title' => 'Today, I turn my struggles into offerings, knowing that positive habits reshape my mind.',
                'description' => 'Habit loops can be broken by replacing harmful patterns with positive actions.',
                'show_date' => Carbon::parse('2025-06-25'),
            ],
            [
                'title' => 'I am capable of change, and each small step builds momentum.',
                'description' => 'Success is found in consistent action, not sudden transformation.',
                'show_date' => Carbon::parse('2025-06-26'),
            ],
            [
                'title' => 'I forgive myself for past setbacks and move forward with confidence.',
                'description' => 'Progress is showing up again, not being perfect.',
                'show_date' => Carbon::parse('2025-06-27'),
            ],
            [
                'title' => 'Every new day is a chance to grow stronger.',
                'description' => 'Even small wins count toward your big goal.',
                'show_date' => Carbon::parse('2025-06-28'),
            ],
        ];

        foreach ($affirmations as $item) {
            DailyAffirmative::create($item);
        }
    }
}
