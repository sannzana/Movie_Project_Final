<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id', 'movie_id', 'date_showtime_id', 'total_price', 'status', 'transaction_id', 'currency'];

    protected static function booted()
    {
        static::saved(function ($payment) {
            if ($payment->status === 'paid') {
                \App\Models\Booking::where('user_id', $payment->user_id)
                                   ->where('movie_id', $payment->movie_id)
                                   ->where('date_showtime_id', $payment->date_showtime_id)
                                   ->update(['status' => 'paid']);
            }
        });
    }
}