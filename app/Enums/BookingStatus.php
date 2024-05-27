<?php

namespace App\Enums;

/**
 * Enum for booking status.
 */
enum BookingStatus: string
{
    case BOOKED='booked';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
    case PENDING = 'pending';
}
