<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::create([
            'name' => 'Hotel California',
            'location' => 'Los Angeles, CA',
            'description' => 'A lovely place to stay in California.',
            'rating' => 5,
        ]);

        Hotel::create([
            'name' => 'The Grand Hotel',
            'location' => 'New York, NY',
            'description' => 'Luxury accommodation in the heart of the city.',
            'rating' => 4,
        ]);

        Hotel::create([
            'name' => 'Beachside Resort',
            'location' => 'Miami, FL',
            'description' => 'Relax and unwind by the beach.',
            'rating' => 4,
        ]);
    }
}
