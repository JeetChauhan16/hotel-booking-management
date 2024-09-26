<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <p>Dear {{ $booking->user->name }},</p>
    <p>Your booking has been confirmed!</p>
    <p>Room Number: {{ $booking->room->room_number }}</p>
    <p>Check-in Date: {{ $booking->check_in }}</p>
    <p>Check-out Date: {{ $booking->check_out }}</p>
    <p>Thank you for choosing us!</p>
</body>
</html>
