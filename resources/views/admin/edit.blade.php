
@extends('admin.dashlay')

@section('body2')
       <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $movie->title }}" required>
    <input type="text" name="genre" value="{{ $movie->genre }}" required>
    <textarea name="description">{{ $movie->description }}</textarea>
    <input type="date" name="release_date" value="{{ $movie->release_date->format('Y-m-d') }}" required>
    <input type="file" name="poster_url">
    <input type="text" name="starring" value="{{ $movie->starring }}">
    <input type="text" name="director" value="{{ $movie->director }}">
    <input type="text" name="producer" value="{{ $movie->producer }}">
    <input type="text" name="type" value="{{ $movie->type }}">
    <input type="text" name="duration" value="{{ $movie->duration }}">
    <input type="text" name="age_rating" value="{{ $movie->age_rating }}">
    <input type="number" name="ticket_price" value="{{ $movie->ticket_price }}">
    <button type="submit">Update Movie</button>
   </form>


<style>
   /* Basic styling for form elements */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
}

form input[type="text"],
form input[type="date"],
form input[type="file"],
form input[type="number"],
form textarea,
form button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Button styling */
form button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

form button:hover {
    background-color: #45a049;
}

/* Responsive design for mobile devices */
@media (max-width: 600px) {
    form {
        padding: 15px;
    }

    form input[type="text"],
    form input[type="date"],
    form input[type="file"],
    form input[type="number"],
    form textarea,
    form button {
        padding: 8px;
    }
}

/* Responsive design for tablets */
@media (min-width: 601px) and (max-width: 1024px) {
    form {
        padding: 20px;
    }

    form input[type="text"],
    form input[type="date"],
    form input[type="file"],
    form input[type="number"],
    form textarea,
    form button {
        padding: 10px;
    }
}

</style>



@endsection