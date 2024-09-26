<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_booking_creation()
{
    $user = User::factory()->create();
    $room = Room::factory()->create(['is_available' => true]);

    $response = $this->actingAs($user)->post(route('bookings.store'), [
        'room_id' => $room->id,
        'check_in' => now()->format('Y-m-d'),
        'check_out' => now()->addDays(2)->format('Y-m-d'),
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('bookings', [
        'user_id' => $user->id,
        'room_id' => $room->id,
    ]);
}

}
