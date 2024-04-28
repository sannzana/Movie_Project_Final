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
                ['start' => '10:00', 'end' => '13:00'], // Changed '1:00' to '13:00' for clarity
                ['start' => '14:30', 'end' => '17:30'], // '2:30 PM' to '14:30', '5:30 PM' to '17:30'
                ['start' => '19:00', 'end' => '22:00'], // '7:00 PM' to '19:00', '10:00 PM' to '22:00'
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
