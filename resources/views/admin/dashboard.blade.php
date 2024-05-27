


@extends('admin.dashlay')

@section('body2')
     <!-- Sales Chart Start -->

     <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                            <p class="mb-2">Today Sale</p>
                        <h6 class="mb-0">৳{{ number_format($todaySales, 2) }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                            <p class="mb-2">Monthly Sale</p>
                        <h6 class="mb-0">৳{{ number_format($monthlySales, 2) }}</h6>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                            <p class="mb-2">Total Revenue</p>
                        <h6 class="mb-0">৳{{ number_format($totalRevenue, 2) }}</h6>
                            </div>
                        </div>
                    </div>





                    
                </div>
    </div>



     
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Sales</h6>
                        <a href="{{ route('admin.bookings') }}">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                               
                                    <th>Movie Title</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Seats</th>
                                <th>Total Price</th>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($todayBookings as $booking)
                                <tr>
                                    <td>{{ $booking['movie_title'] }}</td>
                                    <td>{{ $booking['date'] }}</td>
                                    <td>{{ $booking['start_time'] }}</td>
                                    <td>{{ $booking['end_time'] }}</td>
                                    <td>{{ implode(', ', $booking['seat_numbers']) }}</td>
                                    <td>{{ $booking['total_price'] }}</td>
                                    <td>{{ $booking['user_id'] }}</td>
                                    <td>{{ $booking['user_name'] }}</td>
                                    <td>
                                        <form action="{{ route('bookings.destroy', $booking['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->







            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Recent Reviews</h6>
                                <a href="{{ route('admin.reviews') }}">Show All</a>
                            </div>
                            @foreach ($recentReviews as $review)
                    <div class="d-flex align-items-center border-bottom py-3">
                        @if ($review->user && $review->user->image)
                            <img class="rounded-circle flex-shrink-0" src="{{ Storage::url($review->user->image) }}" alt="" style="width: 40px; height: 40px;">
                        @else
                            <img class="rounded-circle flex-shrink-0" src="{{ asset('default-profile.png') }}" alt="" style="width: 40px; height: 40px;">
                        @endif
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">{{ $review['user_name'] }}</h6>
                                <small>{{ $review['time_ago'] }}</small>
                            </div>
                            <span>{{ $review['review'] }}</span>
                        </div>
                    </div>
                @endforeach
                               
                           
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                             
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>


                    
                   <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                              
                            </div>
                            <!-- <div class="d-flex mb-2">
                                <input class="form-control bg-dark border-0" type="text" placeholder="Enter task">
                                <button type="button" class="btn btn-primary ms-2">Add</button> -->


                                <form action="{{ route('tasks.store') }}" method="POST" class="d-flex mb-2">
                              @csrf
                               <div class="d-flex mb-2">
                                   <input name="description" class="form-control bg-dark border-0" type="text" placeholder="Enter task" required>
                                   <button type="submit" class="btn btn-primary ms-2">Add</button>
                            </div>
                                </form>


                          <div id="task-list">
                               @foreach ($tasks as $task)
                             <div class="d-flex align-items-center border-bottom py-2">
                                   <!-- Form for updating the task's completion status -->
                                  <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-flex align-items-center w-100">
                                @csrf
                                @method('PATCH')
                                <input class="form-check-input m-0" type="checkbox" name="is_completed" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}>
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span class="{{ $task->is_completed ? 'text-decoration-line-through text-danger' : '' }}">{{ $task->description }}</span>
                                    </div>
                                </div>
                            </form>
                            <!-- Separate form for deleting the task -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="margin-left: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-primary">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </div>
                       @endforeach
                           </div>

                     </div>
        </div>
      




            <!-- Widgets End -->
  @endsection