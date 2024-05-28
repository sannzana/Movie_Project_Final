@extends('layouts.app')

@section('content')
    <section id="booking-lists" class="p-6 max-w-screen-lg mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center">
            Your Bookings
        </h1>

        @foreach ($bookings as $booking)
          <div
    class="flex flex-col md:flex-row items-center justify-center bg-white border border-gray-200 rounded-lg shadow-lg w-full p-5 mb-3 max-w-screen-lg mx-auto dark:border-gray-700 dark:bg-gray-800">
    <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
      
    </div>
    <div class="flex flex-col flex-grow">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center md:text-left">
                {{ $booking->movie->title }}
            </h2>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    Date and Showtime
                </h3>
                <p class="text-gray-700 dark:text-gray-300">
                    {{ $booking->dateShowtime->date->date->format('D, j M Y') }}
                    {{ $booking->dateShowtime->showtime->start_time }}-{{ $booking->dateShowtime->showtime->end_time }}
                </p>
            </div>
            
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    Booking Status
                </h3>
                <p class="py-1 text-gray-700 dark:text-gray-300">
                    @if ($booking->status->value == 'paid')
                        <span
                            class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                        @else
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                    @endif
                    {{ strtoupper($booking->status->value) }}
                    </span>
                </p>
            </div>
            @if ($booking->status->value == 'paid')
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                        Seat Numbers
                    </h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        @foreach ($booking->seats as $seat)
                            {{ $seat->seat_number }}{{ $loop->last ? '' : ',' }}
                        @endforeach
                    </p>
                </div>
            @endif
        </div>

        {{-- show cancel button if booking is not cancelled and date and showtime is not passed --}}
        @php
            // date formatting
            $formattedDate = $booking->dateShowtime->date->date->format('Y-m-d');
            $isToday = $formattedDate == $currentDate;
            $isPastDate = $formattedDate < $currentDate;
            $isPastShowtime = $booking->dateShowtime->showtime->start_time < $currentTime;
            $isCancelled = $isPastDate || ($isPastShowtime && $isToday) || $booking->status->value == 'cancelled';
        @endphp

        @if (!$isCancelled)
            <div class="flex justify-center mt-4 md:justify-end">
                <form action="{{ route('bookings.update', $booking) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button
                        class="px-4 py-2 text-sm font-medium text-white bg-primary-500 hover:bg-primary-600 rounded-lg focus:outline-none">
                        Cancel Booking
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

        @endforeach

      
    </section>





    <style>
        /* CSS for Booking List Section */

#booking-lists {
    padding: 3rem 1rem;
}

/* Card Styles */
.flex {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

.flex-col {
    flex-direction: column;
}

.bg-white {
    background-color: #fff;
}

.border {
    border: 1px solid #e5e7eb;
}

.rounded-lg {
    border-radius: 0.5rem;
}

.shadow-lg {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.w-full {
    width: 100%;
}

.p-5 {
    padding: 1.25rem;
}

.mb-3 {
    margin-bottom: 0.75rem;
}

.mb-8 {
    margin-bottom: 2rem;
}

.max-w-screen-lg {
    max-width: 1024px;
}

.mx-auto {
    margin-left: auto;
    margin-right: auto;
}

/* Image Styles */
.w-32 {
    width: 8rem;
}

.h-auto {
    height: auto;
}

/* Text Styles */
.text-center {
    text-align: center;
}

.text-3xl {
    font-size: 1.875rem;
}

.font-bold {
    font-weight: 700;
}

.text-2xl {
    font-size: 1.5rem;
}

.text-gray-900 {
    color: #374151;
}

.text-white {
    color: #fff;
}

.text-sm {
    font-size: 0.875rem;
}

.font-semibold {
    font-weight: 600;
}

/* Button Styles */
.py-1 {
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
}

.px-2.5 {
    padding-left: 0.625rem;
    padding-right: 0.625rem;
}

.rounded {
    border-radius: 0.375rem;
}

/* Booking Detail Styles */
.grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1rem;
}

.gap-4 {
    gap: 1rem;
}

/* Responsive Styles */
@media (min-width: 640px) {
    .md:flex-row {
        flex-direction: row;
    }
    .md:flex-col {
        flex-direction: column;
    }
    .md:items-center {
        align-items: center;
    }
    .md:justify-between {
        justify-content: space-between;
    }
    .md:mr-6 {
        margin-right: 1.5rem;
    }
    .md:mb-0 {
        margin-bottom: 0;
    }
    .md:mb-4 {
        margin-bottom: 1rem;
    }
    .md:text-left {
        text-align: left;
    }
    .md:text-center {
        text-align: center;
    }
    .md:flex-grow {
        flex-grow: 1;
    }
    .md:mt-4 {
        margin-top: 1rem;
    }
    .md:justify-end {
        justify-content: flex-end;
    }
}

/* Dark Mode Styles */
.dark:bg-gray-800 {
    background-color: #1f2937;
}

.dark:border-gray-700 {
    border-color: #4b5563;
}

.dark:text-white {
    color: #fff;
}

.dark:border-red-900 {
    border-color: #991b1b;
}

.dark:text-gray-300 {
    color: #d1d5db;
}

.dark:bg-red-900 {
    background-color: #991b1b;
}

.dark:text-red-300 {
    color: #fcd5ce;
}

.dark:bg-green-900 {
    background-color: #047857;
}

.dark:text-green-300 {
    color: #9ae6b4;
}
</style>
@endsection
