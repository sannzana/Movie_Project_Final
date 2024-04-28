@extends('admin.dashlay')

@section('body2')
    





    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Movie Details -->
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="release_date">Release Date:</label>
            <input type="date" id="release_date" name="release_date" required>
        </div>
        <div>
            <label for="poster_url">Poster URL:</label>
            <input type="file" id="poster_url" name="poster_url" accept="image/*" required>
        </div>
        <div>
            <label for="starring">Starring:</label>
            <input type="text" id="starring" name="starring" required>
        </div>
        <div>
            <label for="director">Director:</label>
            <input type="text" id="director" name="director" required>
        </div>
        <div>
            <label for="producer">Producer:</label>
            <input type="text" id="producer" name="producer" required>
        </div>
        <div>
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required>
        </div>
        <div>
            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" required>
        </div>
        <div>
            <label for="age_rating">Age Rating:</label>
            <input type="text" id="age_rating" name="age_rating" required>
        </div>
        <div>
            <label for="ticket_price">Ticket Price:</label>
            <input type="number" id="ticket_price" name="ticket_price" required>
        </div>

        <!-- Dates Section -->
        <div id="dateSection">
            <label for="date1">Date:</label>
            <input type="date" id="date1" name="dates[]">
        </div>
        <button type="button" onclick="addDate()">Add Another Date</button>
        
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>

    <script>
        let dateCounter = 1;

        function addDate() {
            dateCounter++;
            let newField = document.createElement('div');
            newField.innerHTML = `<label for="date${dateCounter}">Date:</label><input type="date" id="date${dateCounter}" name="dates[]">`;
            document.getElementById('dateSection').appendChild(newField);
        }
    </script>















 
         @endsection
