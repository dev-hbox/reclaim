<?php

namespace Database\Seeders;

use App\Models\PanicTask;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PanicTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::first();

        foreach (range(1, 3) as $i) {
            PanicTask::create([
                'user_id' => $user->id,
                'task_type' => collect(['mental', 'physical', 'breathing'])->random(),
                'intensity' => collect(['light', 'moderate', 'deep'])->random(),
                'completed' => (bool)rand(0, 1),
                'started_at' => now()->subMinutes(5),
                'completed_at' => now(),
                'notes' => 'Completed panic task example',
            ]);
        }
    }
}
