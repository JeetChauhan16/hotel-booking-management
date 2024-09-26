<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'hotel_id' => 1, // Assuming the hotel_id for 'Hotel California' is 1
            'room_number' => '101',
            'price' => 200,
            'is_available' => true,
        ]);

        Room::create([
            'hotel_id' => 1,
            'room_number' => '102',
            'price' => 250,
            'is_available' => true,
        ]);

        // Create dummy rooms for The Grand Hotel
        Room::create([
            'hotel_id' => 2,
            'room_number' => '201',
            'price' => 300,
            'is_available' => false,
        ]);

        Room::create([
            'hotel_id' => 2,
            'room_number' => '202',
            'price' => 350,
            'is_available' => true,
        ]);

        // Create dummy rooms for Beachside Resort
        Room::create([
            'hotel_id' => 3,
            'room_number' => '301',
            'price' => 150,
            'is_available' => true,
        ]);

        Room::create([
            'hotel_id' => 3,
            'room_number' => '302',
            'price' => 180,
            'is_available' => true,
        ]);
    }
}
