<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style22.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
<!-- Confirmation Modal -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Confirm Your Booking</h2>
        <p id="modalMovieTitle"></p>
        <p id="modalDate"></p>
        <p id="modalShowtime"></p>
        <p id="modalSeats"></p>
        <p id="modalTicketPrice"></p> <!-- New paragraph for single ticket price -->
        <p id="modalTotalPrice"></p> <!-- New paragraph for total price -->
        <button onclick="submitForm()">Confirm Booking</button>
        <button onclick="closeModal()">Cancel</button>
    </div>
</div>


    <form id="bookingForm" action="{{ route('bookings.store', [$movie, $date, $showtime]) }}" method="POST">
        @csrf


 <div class="book">
<!-- left start -->
<div class="left">
    <img src="{{ Storage::url($movie->poster_url) }}">
    <div class="play">
        <i class="bi bi-play-fill"></i>
    </div>

    <div class="cont">
        <h6>Directed By</h6>
        <p>{{ $movie->director}} </p>
        <h6>Starring</h6>
        <p>{{ $movie->starring }}</p>
        <h6>Starring</h6>
        <p>dsfdsfd</p>
        <h2>DESCRIPTION</h2>
        <p>{{ $movie->description}}</p>
        <!--      change later -->
    </div>
    


</div>
<!-- left end -->










<!-- right start -->
<div class="right">
    <!-- video eikhn e dibo,1;21;53--1;24;02 -->
<!-- <video src=""></video> -->



<div class="head_time">
    <input type="text"  style=" color: #fff;" name="movie" id="movie" aria-label="movie"
                            
    value="{{ $movie->title }}" disabled readonly>
    <!-- ei jaygayei database theke information asbe -->
     <div class="time">
        <h6><i class="bi bi-clock"></i>{{ $movie->duration}}</h6>
    <!-- database theke duration -->
    <button>PG-13</button>
</div>
</div>




<div class="date_type">
    <div class="left_curd">
    <!-- for date and time -->
    <h6 class="title" style="color: aliceblue;">Thursday 3 May</h6>
    <div class="card_month crd" style="color: aliceblue;">
        <input type="text" name="date" id="date" aria-label="date"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
            value="{{ $date->date->format('D, j M Y') }}" disabled readonly>
    </div>
    
    
    </div>
    
    <!-- timing er jonno -->
    
    <div class="right_curd">
        <h6 class="title" style="color: aliceblue;">Thursday 3 May</h6>
    <div class="card_month crd" style="color: aliceblue;">
           
        <input type="text" name="showtime" id="showtime" aria-label="showtime"
        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
        value="{{ $showtime->start_time }} - {{ $showtime->end_time }}" disabled readonly>
    
    </div>
    </div>
    
    
    
    </div>
    
<div class="screen">screen</div>
<!-- chairs -->

<div class="chair">
    @php $rowCount = 10; @endphp
    @foreach ($seats->chunk($rowCount) as $chunkedSeats)
        <div class="row">
            <span>J</span>
            @foreach ($chunkedSeats as $seat)
            <span>
                            {{ $seat->seat_number }}
                        </span>
                        <li class="meow seat {{ $seat->isBooked($movie, $date, $showtime) ? 'disabled' : '' }}">

                    <label for="seat{{ $seat->id }}">
                        <input type="checkbox" name="seats[]" id="seat{{ $seat->id }}"
                               value="{{ $seat->id }}" class="seat-checkbox"  onchange="toggleReviewButton()"
                               {{ $seat->isBooked($movie, $date, $showtime) ? 'disabled' : '' }}>
                        
                    </label>
                </li>
               
            @endforeach
            <span>J</span>
        </div>
    @endforeach
</div>


<div class="details" id="det">
    <div class="details_chair">
        <li>Available</li>
        <li>Booked</li>
        <li>Selected</li>

    </div>
</div>

<!-- <button type="button" onclick="reviewBooking()">Review Booking</button> -->
<form id="bookingForm" action="{{ route('exampleHostedCheckout') }}" method="POST">
    @csrf
    <input type="hidden" id="ticket_price" name="ticket_price" value="{{ $movie->ticket_price }}">
    <input type="hidden" id="total_price" name="total_price">
    <input type="hidden" name="movie_title" id="movie_title" value="{{ $movie->title }}">
    <input type="hidden" name="show_date" id="show_date" value="{{ $date->id }}">
    <input type="hidden" name="show_time" id="show_time" value="{{ $showtime->id }}">
    <input type="hidden" name="seat_numbers" id="seat_numbers">

    <!-- Other form fields -->

    <div class="buttons-container">
        <div class="button-group left-button">
            <h6 class="button-label">Click To Book</h6>
            <button type="button" id="reviewBookingBtn" onclick="reviewBooking()" disabled class="book_tic">
                <i class="bi bi-check2-circle"></i>
            </button>
        </div>
        <div class="button-group right-button">
            <h6 class="button-label">Click To Pay</h6>
            <button type="button" id="payBookingBtn" onclick="payBooking()" class="book_tic pay_tic">
                <i class="bi bi-cash"></i>
            </button>
        </div>
    </div>
</form>
</form>


<script>
function toggleReviewButton() {
    const seats = document.querySelectorAll('.seat-checkbox');
    const isAnySeatSelected = Array.from(seats).some(checkbox => checkbox.checked);
    document.getElementById('reviewBookingBtn').disabled = !isAnySeatSelected;
    document.getElementById('payBookingBtn').disabled = !isAnySeatSelected;
}

function reviewBooking() {
    document.getElementById('modalMovieTitle').innerText = document.getElementById('movie').value;
    document.getElementById('modalDate').innerText = document.getElementById('date').value;
    document.getElementById('modalShowtime').innerText = document.getElementById('showtime').value;
    
    const selectedSeats = Array.from(document.querySelectorAll('.seat-checkbox:checked'))
        .map(input => input.closest('li').previousElementSibling.textContent.trim());
    
    document.getElementById('modalSeats').innerText = 'Selected Seats: ' + selectedSeats.join(', ');

    const ticketPrice = parseFloat(document.getElementById('ticket_price').value);
    const totalPrice = selectedSeats.length * ticketPrice;

    document.getElementById('modalTicketPrice').innerText = 'Ticket Price: ' + ticketPrice.toFixed(2) + ' TK';
    document.getElementById('modalTotalPrice').innerText = 'Total Price: ' + totalPrice.toFixed(2) + ' TK';

    document.getElementById('confirmationModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('confirmationModal').style.display = 'none';
}

function submitForm() {
    document.getElementById('bookingForm').submit();
}

window.onclick = function(event) {
    if (event.target == document.getElementById('confirmationModal')) {
        closeModal();
    }
}

function payBooking() {
    const selectedSeats = Array.from(document.querySelectorAll('.seat-checkbox:checked'))
        .map(input => input.closest('li').previousElementSibling.textContent.trim());
    document.getElementById('seat_numbers').value = selectedSeats.join(', ');

    const ticketPrice = parseFloat(document.getElementById('ticket_price').value);
    const totalPrice = selectedSeats.length * ticketPrice;

    const form = document.getElementById('bookingForm');

    // Set form action dynamically
    form.action = "{{ route('exampleHosted') }}";
    form.method = "POST";

    // Append hidden fields
    form.appendChild(createHiddenInput('ticket_price', ticketPrice));
    form.appendChild(createHiddenInput('total_price', totalPrice));
    form.appendChild(createHiddenInput('status', 'pending')); // Status as hidden input if needed

    form.submit();
}

function createHiddenInput(name, value) {
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = name;
    input.value = value;
    return input;
}


</script>




</body>



<style>







<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Booking;
use App\Models\User;
use App\Models\Movie;
use App\Models\Date;
use App\Models\Showtime;
use App\Models\Seat;
use App\Models\DateShowtime;


class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout(Request $request, $movie, $date, $showtime)
    {
        $request->validate([
            'seats' => ['required', 'array', 'min:1', 'max:6', 'exists:seats,id'],
        ]);
    
        $user = User::find(auth()->id());
        if (!$user) {
            return back()->with('error', 'User not found.');
        }
    
        $movie = Movie::find($movie);
        $date = Date::find($date);
        $showtime = Showtime::find($showtime);
        $seats = Seat::findMany($request->input('seats'));
    
        $date_showtime = DateShowtime::where('date_id', $date->id)
                                     ->where('showtime_id', $showtime->id)
                                     ->first();
        if (!$date_showtime) {
            return back()->with('error', 'Showtime details not found.');
        }
    
        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->movie_id = $movie->id;
        $booking->date_showtime_id = $date_showtime->id;
        $booking->total_price = count($seats) * $movie->ticket_price;
        $booking->status = 'pending';  // Set status as pending
    
        $booking->save();
    
        // Optionally attach seats to the booking if your schema supports it
       
        }
    






 


    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('payments')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request)
    {
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                echo "<br >Transaction is successfully Completed";
            }
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}






















<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>SHINECINE</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>SHINECINE</h2>
        <p class="lead">Please Proceed To Payment</p>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your Booking</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Movie Name</h6>
                        <small class="text-muted">{{ $movieTitle }}</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Show Date</h6>
                        <small class="text-muted">{{ $showDate }}</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Show Time</h6>
                        <small class="text-muted">{{ $showTime }}</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Ticket Price (BDT)</h6>
                        <small class="text-muted">{{ $ticketPrice }} TK</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Seats</h6>
                        <small class="text-muted">{{ $seatNumbers }}</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Amount (BDT)</span>
                    <strong>{{ $totalPrice }} TK</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Fill The Details</h4>
            <form id="bookingForm" action="{{ route('exampleHostedCheckout') }}" method="POST">
                @csrf
          

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="customer_name">Full name</label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{ $user->name }}" disabled>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile"
                               value="{{ $user->phone_number }}" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" name="customer_email" class="form-control" id="email"
                           placeholder="you@example.com" value="{{ $user->email}}" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                

                <div class="mb-3">
                    <label for="address2">Address<span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>

              
                
               
             
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue Pay</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKpH9Jv3tozTRJfZ+Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html> 
