<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;








class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'description',
        'release_date',
        'poster_url',
        'starring',
        'director',
        'producer',
        'type',
        'duration',
        'age_rating',
        'ticket_price',
    ];

    protected $casts = [
        'age_rating' => 'integer',
        'ticket_price' => 'integer',
        'release_date' => 'date',
    ];

    /**
     * One to many relation to Date model.
     */
    // public function dates() {
    //     return $this->hasMany(Date::class);
    // }

    /**
     * One to many relation to Booking model.
     */
    public function bookings() {
        return $this->hasMany(Booking::class);
    }
    

    /**
     * Scope a query to only include movies that match a certain title.
     */
    public function scopeFilter($query, ?string $title, ?string $sort) {
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($sort) {
            $sort = str_replace(' ', '_', $sort);
            $query->orderBy($sort);
        }
    }

    /**
     * Loads dates for the current week.
     */
    public function loadDatesForCurrentWeek() {
        $currentDate = now(); // Get the current date and time
        $twoWeeksLater = $currentDate->copy()->addWeeks(2); // Move two weeks ahead
    
        return $this->load([
            'dates' => function ($query) use ($currentDate, $twoWeeksLater) {
                $query->whereBetween('date', [$currentDate, $twoWeeksLater]);
            },
        ]);
    }

    public function dates(): BelongsToMany
    {
     
        return $this->belongsToMany(Date::class, 'date_movie', 'movie_id', 'date_id');
    }




    public function loadAllDates() {
        return $this->load('dates'); // Simply load all dates related to the movie
    }
    



}
