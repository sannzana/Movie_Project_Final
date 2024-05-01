

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

