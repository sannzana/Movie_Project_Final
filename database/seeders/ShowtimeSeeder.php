<?php

namespace Database\Seeders;

use App\Models\Date;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Database\Seeder;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // showtime schedule
        $schedule = [
            ['start' => '10:00', 'end' => '1:00'],
            ['start' => '2:30', 'end' => '5:30'],
            ['start' => '7:00', 'end' => '10:00'],

        ];

        foreach ($schedule as $time) {
            // create showtime record
            Showtime::create([
                'start_time' => $time['start'],
                'end_time' => $time['end'],
            ]);
        }
    }
}
