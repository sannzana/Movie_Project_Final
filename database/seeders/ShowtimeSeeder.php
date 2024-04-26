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
            ['start' => '10:00 am', 'end' => '1:00 pm'],
            ['start' => '2:30 pm', 'end' => '5:30 pm'],
            ['start' => '7:00 pm', 'end' => '10:00pm'],

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
