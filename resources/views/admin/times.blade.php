@extends('admin.dashlay')

@section('body2')
    <title>Document</title>
    <style>
        h2 {
            text-align: center;
            padding: 20px 0;
        }

        .table-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            overflow-x: auto;
        }

        .responsive-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .responsive-table th,
        .responsive-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .responsive-table thead {
            background-color: #f4f4f4;
        }

        .responsive-table th {
            position: sticky;
            top: 0;
            background-color: #f4f4f4;
        }

        .responsive-table img {
            width: 100%;
            height: auto;
            max-height: 100px;
        }

        @media (max-width: 768px) {
            .responsive-table thead tr {
                display: none;
            }

            .responsive-table tr {
                display: block;
                margin-bottom: 0.75em;
            }

            .responsive-table td {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
                border: none;
                border-bottom: 1px solid #ddd;
            }

            .responsive-table td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }

            .responsive-table td[data-label="Poster"] img {
                width: auto;
                height: auto;
                max-height: 150px;
                display: block;
                margin: 0 auto;
            }

            .responsive-table, .responsive-table td:before {
                font-size: 14px;
            }
        }

        @media (max-width: 540px) {
            .responsive-table tr {
                margin-bottom: 0.625em;
                border-bottom: 3px solid #ddd;
            }

            .responsive-table td[data-label="Poster"] img {
                max-height: 100px;
            }

            .responsive-table, .responsive-table td:before {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .responsive-table tr {
                margin-bottom: 0.625em;
                border-bottom: 3px solid #ddd;
            }

            .responsive-table td[data-label="Poster"] img {
                max-height: 100px;
            }

            .responsive-table, .responsive-table td:before {
                font-size: 12px;
            }
        }

        /* New CSS for Dates and Showtimes */
        .dates-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            overflow-x: auto;
            margin-bottom: 20px;
        }

        .date-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .date-item h4 {
            margin: 0 0 10px 0;
        }

        .date-item form {
            margin-bottom: 10px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .date-item form .form-group {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .date-item form .form-group label,
        .date-item form .form-group input {
            width: 100%;
            max-width: 300px;
            margin-bottom: 5px;
        }

        .date-item form button {
            width: 100%;
            max-width: 150px;
        }

        .date-item ul {
            padding-left: 20px;
        }

        .date-item ul li {
            list-style-type: disc;
        }

        @media (max-width: 768px) {
            .date-item h4 {
                font-size: 1.2em;
            }

            .date-item ul {
                padding-left: 15px;
            }
        }

        @media (max-width: 480px) {
            .date-item h4 {
                font-size: 1em;
            }

            .date-item ul {
                padding-left: 10px;
            }
        }
    </style>

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

    <h2>Dates and Showtimes</h2>
    <div class="dates-container">
        @foreach ($movie->dates as $date)
            <div class="date-item">
                <h4>Date: {{ $date->date->format('D, j M Y') }}</h4>
                <form action="{{ route('admin.date.update', $date) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" value="{{ $date->date->format('Y-m-d') }}" required>
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
                            @if ($loop->first)
                                Morning Show:
                            @elseif ($loop->index == 1)
                                Afternoon Show:
                            @else
                                Evening Show:
                            @endif
                            {{ convertTo12HourFormat($showtime->start_time) }} - {{ convertTo12HourFormat($showtime->end_time) }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    @php
        function convertTo12HourFormat($time) {
            $timeMappings = [
                '10:00' => '10am',
                '13:00' => '1pm',
                '14:30' => '2:30pm',
                '17:30' => '5:30pm',
                '19:00' => '7pm',
                '22:00' => '10pm',
            ];

            return $timeMappings[$time] ?? date('g:ia', strtotime($time));
        }
    @endphp
@endsection


