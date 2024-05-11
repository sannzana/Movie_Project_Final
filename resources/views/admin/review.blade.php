@extends('admin.dashlay')

@section('body2')

<div class="container">
    <h1>Reviews</h1>
    <div class="row">
        @foreach ($reviews as $review)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ $review->user->name }}
                    </div>
                    <div class="card-body">
                        <p><strong>Email:</strong> {{ $review->user->email }}</p>
                        <p><strong>Phone:</strong> {{ $review->user->phone_number }}</p>
                        <p class="card-text">{{ $review->review }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $review->created_at->format('d/m/Y') }}
                    </div>
                    <!-- New div to show posting status to homepage -->
                    <div class="card-footer">
                        @if ($review->post == 'Y')
                            <p class="text-success">Already posted to homepage.</p>
                        @else
                            <p class="text-warning">Still not posted to homepage.</p>
                        @endif
                    </div>
                    <!-- Buttons to change post status -->
                    <div class="card-footer">
                        <form action="{{ route('review.toggle', $review->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <span>Post:</span>
                            <button type="submit" name="post" value="Y" class="btn btn-success">Yes</button>
                            <button type="submit" name="post" value="N" class="btn btn-danger">No</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection


<style>
    @media (max-width: 768px) {
    .card-body p, .card-footer p {
        font-size: 14px; /* Smaller font size on smaller screens */
    }
}

@media (max-width: 480px) {
    .card {
        padding: 10px; /* Reduce padding on smaller screens */
    }
    .card-header, .card-body, .card-footer {
        padding: 5px; /* Less padding inside the card */
    }
}
</style>