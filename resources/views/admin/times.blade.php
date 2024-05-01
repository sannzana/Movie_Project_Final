<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<h2>Responsive Table without Bootstrap</h2>

<div class="table-container">
    <table class="responsive-table">
        <caption class="table-caption">An example of a responsive table using custom CSS:</caption>
        <thead>
    <tr>
        <th>Ongoing Movies</th>
        <th>Movie-Title</th>
        <th>Release-Date</th>
        <th>Poster</th>
        <th>Duration</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td data-label="Ongoing Movies">{{ $movie->id }}</td>
        <td data-label="Movie-Title">{{ $movie->title }}</td>
        <td data-label="Release-Date">{{ $movie->release_date }}</td>
        <td data-label="Poster">
            <img src="{{ Storage::url($movie->poster_url) }}" style="width: 100%; height: auto; max-height: 100px;">
        </td>
        <td data-label="Duration">{{ $movie->duration }}</td>
        <td data-label="Edit">
            <a href="{{ route('admin.movies.edit', $movie->id) }}">
                <button type="button">Update</button>
            </a>
        </td>
        <td data-label="Delete">
            <form action="{{ route('admin.movies.delete', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
</tbody>
</table>
</div>
                {{-- Inside your admin.times Blade view --}}
                @foreach ($movie->dates as $date)
    <div>
        <h4>Date: {{ $date->date }}</h4>
        <form action="{{ route('admin.date.update', $date) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="{{ $date->date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Date</button>
        </form>

       

        <form action="{{ route('admin.date.delete', $date) }}" method="POST" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Date</button>
        </form>

        <ul>
            @foreach ($date->showtimes as $showtime)
                <li>
                    {{ $showtime->start_time }} - {{ $showtime->end_time }}
                </li>
            @endforeach
        </ul>
    </div>
@endforeach




<p class="p">Demo by George Martsoukos. <a href="http://www.sitepoint.com/responsive-data-tables-comprehensive-list-solutions" target="_blank">See article</a>.</p>


<section id="dates-showtimes" class="container">
    <h2>Dates and Showtimes</h2>
    <div class="grid">
        @foreach ($movie->dates as $date)
            <div class="date-card">
                <h3>{{ $date->date->format('D, j M Y') }}</h3>
                <ul>
                    @foreach ($date->showtimes as $showtime)
                        @php
                            $formattedDate = $date->date->format('Y-m-d');
                            $isToday = $formattedDate == $currentDate;
                            $isPastDate = $formattedDate < $currentDate;
                            $isPastShowtime = $showtime->start_time < $currentTime;
                            $disabled = $isPastDate || ($isToday && $isPastShowtime);
                        @endphp
                        <li class="{{ $disabled ? 'disabled' : 'available' }}">
                            <a href="{{ route('bookings.create', [$movie, $date, $showtime]) }}">
                                <button type="button">
                                    {{ $showtime->start_time }} - {{ $showtime->end_time }}
                                </button>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</section>











<style>
h2 {
  text-align: center;
  padding: 20px 0;
}

.table-container {
  width: 100%;
  overflow-x: auto; /* Enables horizontal scrolling for smaller devices */
}

.responsive-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px; /* Adds some space below the table */
}

.responsive-table th,
.responsive-table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

.responsive-table thead {
  background-color: #f4f4f4; /* Light grey background for the table header */
}

.responsive-table th {
  position: sticky;
  top: 0; /* Keeps the header on top while scrolling */
  background-color: #f4f4f4;
}

.responsive-table img {
  width: 100%; /* Responsive images within cells */
  height: auto;
  max-height: 100px;
}
















@media (max-width: 768px) {
  /* Set the table to full width to avoid horizontal scrolling */
  .table-container {
    width: 100%;
  }
  
  /* Ensure the table stretches to full width */
  .responsive-table {
    width: 100%;
    border: 0;
  }

  /* Hide the thead on smaller screens */
  .responsive-table thead tr {
    display: none;
  }

  /* Make table rows display as block elements */
  .responsive-table tr {
    display: block;
    margin-bottom: 0.75em; /* Slightly more margin for larger screens */
  }

  /* Style table cells to display as block, appearing as a row */
  .responsive-table td {
    display: block;
    text-align: right; /* Align text to the right to be near the data-label */
    padding-left: 50%; /* Allocate space for the data-label */
    position: relative;
    border: none;
    border-bottom: 1px solid #ddd; /* Bottom border for separation */
  }

  /* Use data-label for pseudo-element content, placed absolutely */
  .responsive-table td:before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 50%; /* Label width */
    padding-right: 10px; /* Space between label and content */
    white-space: nowrap; /* Keep the label on one line */
    text-align: left; /* Align the label text to the left */
    font-weight: bold; /* Make labels bold for better readability */
  }

  /* Additional row styling */
  .responsive-table tr {
    border-bottom: 3px solid #ddd; /* Thicker border for each row */
  }

  /* Specific style for the Poster column to manage image scaling */
  .responsive-table td[data-label="Poster"] img {
    width: auto; /* Width based on content */
    height: auto; /* Height based on content */
    max-height: 150px; /* Increase maximum height for images */
    display: block;
    margin: 0 auto; /* Center images within the cell */
  }

  /* Adjust font size for slightly larger screens */
  .responsive-table, .responsive-table td:before {
    font-size: 14px;
  }
}





@media (max-width: 540px) {
  /* Set the table to full width to avoid horizontal scrolling */
  .table-container {
    width: 100%;
  }
  
  /* Make sure the table stretches to full width */
  .responsive-table {
    width: 100%;
    border: 0;
  }

  /* Hide the thead on small screens */
  .responsive-table thead tr {
    display: none;
  }

  /* Make table rows display block */
  .responsive-table tr {
    display: block;
    margin-bottom: 0.625em;
  }

  /* Make table cells display block, looking like a row */
  .responsive-table td {
    display: block;
    text-align: right; /* Right-align text to keep it close to the data-label */
    padding-left: 50%; /* Give space for the data-label to show */
    position: relative;
    border: none;
    border-bottom: 1px solid #ddd; /* Add a border at the bottom of the cells */
  }

  /* Use the data-label attribute for the pseudo-element content */
  .responsive-table td:before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 50%; /* Width of the label */
    padding-right: 10px; /* Space between label and cell content */
    white-space: nowrap; /* Ensure the label is on one line */
    text-align: left;
    font-weight: bold;
  }
  .responsive-table tr {
    display: block;
    margin-bottom: 0.625em;
    border-bottom: 3px solid #ddd; /* Thicker bottom border for each row */
  }
  /* Style for the Poster column to ensure the image fits well */
  .responsive-table td[data-label="Poster"] img {
    width: auto; /* Adjust to content width */
    height: auto; /* Adjust to content height */
    max-height: 100px; /* Maximum height for the image */
    display: block;
    margin: 0 auto; /* Center the image in the block */
  }

  /* Adjust font size for slightly larger screens */
  .responsive-table, .responsive-table td:before {
    font-size: 14px; /* Slightly larger font size than for max-width 480px */
  }
}


















/* Existing styles... */

@media (max-width: 480px) {
  /* Set the table to full width to avoid horizontal scrolling */
  .table-container {
    width: 100%;
  }
  
  /* Make sure the table stretches to full width */
  .responsive-table {
    width: 100%;
    border: 0;
  }

  /* Hide the thead on small screens */
  .responsive-table thead tr {
    display: none;
  }

  /* Make table rows display block */
  .responsive-table tr {
    display: block;
    margin-bottom: 0.625em;
  }

  /* Make table cells display block, looking like a row */
  .responsive-table td {
    display: block;
    text-align: right; /* Right-align text to keep it close to the data-label */
    padding-left: 50%; /* Give space for the data-label to show */
    position: relative;
    border: none;
    border-bottom: 1px solid #ddd; /* Add a border at the bottom of the cells */
  }

  /* Use the data-label attribute for the pseudo-element content */
  .responsive-table td:before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 50%; /* Width of the label */
    padding-right: 10px; /* Space between label and cell content */
    white-space: nowrap; /* Ensure the label is on one line */
    text-align: left;
    font-weight: bold;
  }
  .responsive-table tr {
    display: block;
    margin-bottom: 0.625em;
    border-bottom: 3px solid #ddd; /* Thicker bottom border for each row */
  }
  /* Style for the Poster column to ensure the image fits well */
  .responsive-table td[data-label="Poster"] img {
    width: auto; /* Adjust to content width */
    height: auto; /* Adjust to content height */
    max-height: 100px; /* Maximum height for the image */
    display: block;
    margin: 0 auto; /* Center the image in the block */
  }

  /* Adjust font size for smaller screens */
  .responsive-table, .responsive-table td:before {
    font-size: 12px;
  }
}

</style>
</body>
</html>


 
   