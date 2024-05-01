@extends('admin.dashlay')

@section('body2')
    <h2>Edit Date</h2>
    <form action="{{ route('admin.date.update', $date->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ $date->date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Date</button>
    </form>


@endsection





