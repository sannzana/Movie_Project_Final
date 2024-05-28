@extends('admin.dashlay')

@section('body2')

<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" class="movie-form">
    @csrf

    <!-- Movie Details -->
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="release_date">Release Date:</label>
        <input type="date" id="release_date" name="release_date" required>
    </div>
    <div class="form-group">
        <label for="poster_url">Poster URL:</label>
        <input type="file" id="poster_url" name="poster_url" accept="image/*" required>
    </div>
    <div class="form-group">
    <label for="video">YouTube Video Link:</label>
    <input type="text" id="video" name="video" placeholder="Enter YouTube Video Link" required>
</div>
    <div class="form-group">
        <label for="starring">Starring:</label>
        <input type="text" id="starring" name="starring" required>
    </div>
    <div class="form-group">
        <label for="director">Director:</label>
        <input type="text" id="director" name="director" required>
    </div>
    <div class="form-group">
        <label for="producer">Producer:</label>
        <input type="text" id="producer" name="producer" required>
    </div>
    <div class="form-group">
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required>
    </div>
    <div class="form-group">
        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" required>
    </div>
    <div class="form-group">
        <label for="age_rating">Age Rating:</label>
        <input type="text" id="age_rating" name="age_rating" required>
    </div>
    <div class="form-group">
        <label for="ticket_price">Ticket Price:</label>
        <input type="number" id="ticket_price" name="ticket_price" required>
    </div>

    <!-- Dates Section -->
    <div id="dateSection" class="form-group">
        <label for="date1">Date:</label>
        <input type="date" id="date1" name="dates[]">
    </div>
    <button type="button" onclick="addDate()">Add Another Date</button>

    <div class="form-group">
        <input type="submit" value="Submit">
    </div>
</form>

<script>
    let dateCounter = 1;

    function addDate() {
        dateCounter++;
        let newField = document.createElement('div');
        newField.classList.add('form-group');
        newField.innerHTML = `<label for="date${dateCounter}">Date:</label><input type="date" id="date${dateCounter}" name="dates[]">`;
        document.getElementById('dateSection').appendChild(newField);
    }
</script>

<style>
    .movie-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 1rem;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .movie-form .form-group {
        margin-bottom: 1rem;
    }

    .movie-form label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .movie-form input[type="text"],
    .movie-form input[type="date"],
    .movie-form input[type="file"],
    .movie-form input[type="number"],
    .movie-form textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .movie-form textarea {
        resize: vertical;
    }

    .movie-form button {
        display: inline-block;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .movie-form button:hover {
        background-color: #0056b3;
    }

    .movie-form input[type="submit"] {
        width: 100%;
        padding: 0.75rem;
        font-size: 1.25rem;
        color: #fff;
        background-color: #28a745;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .movie-form input[type="submit"]:hover {
        background-color: #218838;
    }

    @media (max-width: 768px) {
        .movie-form {
            padding: 1rem;
        }

        .movie-form label {
            font-size: 0.9rem;
        }

        .movie-form input[type="submit"] {
            font-size: 1rem;
        }
    }


    .movie-form input[type="date"] {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 3px;
    /* Set background color to grey */
    background-color: #f2f2f2; /* Adjust as needed */
}

/* To style the datepicker arrow icon */
.movie-form input[type="date"]::-webkit-calendar-picker-indicator {
    filter: grayscale(100%); /* Make the calendar icon grey */
}

/* For Firefox */
.movie-form input[type="date"]::-moz-calendar-picker-indicator {
    filter: grayscale(100%);
}

/* For Edge */
.movie-form input[type="date"]::-ms-calendar-picker-indicator {
    filter: grayscale(100%);
}

</style>

@endsection
