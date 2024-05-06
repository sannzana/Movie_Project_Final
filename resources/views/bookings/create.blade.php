



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
        <span class="close">&times;</span>
        <h2>Confirm Your Booking</h2>
        <p id="modalMovieTitle"></p>
        <p id="modalDate"></p>
        <p id="modalShowtime"></p>
        <p id="modalSeats"></p>
        <!-- <p id="modalSeats">Selected Seats: </p> -->
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

<button type="button" id="reviewBookingBtn" onclick="reviewBooking()" disabled class="book_tic">

    <i class="bi bi-check2-circle"></i></button>
   <h6 style="color: #fff;">Click To Review Booking</h6> 

</button>
</div>






 </div>  
    



 

</form>
<script src="app22.js"></script>

<script>
function toggleReviewButton() {
    // Get all seat checkboxes
    const seats = document.querySelectorAll('.seat-checkbox');
    // Check if at least one checkbox is checked
    const isAnySeatSelected = Array.from(seats).some(checkbox => checkbox.checked);

    // Enable or disable the review booking button based on seat selection
    const reviewButton = document.getElementById('reviewBookingBtn');
    reviewButton.disabled = !isAnySeatSelected;
}

function reviewBooking() {
    // Assuming modal and other elements are set up as previously described
    document.getElementById('modalMovieTitle').innerText = document.getElementById('movie').value;
    document.getElementById('modalDate').innerText = document.getElementById('date').value;
    document.getElementById('modalShowtime').innerText = document.getElementById('showtime').value;

    const selectedSeats = Array.from(document.querySelectorAll('.seat-checkbox:checked'))
        .map(input => input.closest('li').previousElementSibling.textContent.trim());  // Fetch the seat number from the span before the li element

    document.getElementById('modalSeats').innerText = 'Selected Seats: ' + selectedSeats.join(', ');


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

</script>


</body>













<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap'); 

*
{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}


:root{
    --color:linear-gradient(0deg,transparent, rgb(184, 184, 184, .2));

}



body{
    width:100vw;
    height: 100vh;
    display:flex;
    align-items: center;
    justify-content: center;
    background:#1f2025 ;
    font-family: 'Poppons',sans-serif;
}
.book{
    width:92%;
    height: 90%;
     display:flex;
    /* ek line e book-left book-right near jnno */
    /* border:1px solid #fff;  */
}

.book .left, .right{
width: 80%;
position:relative;
height:100%;
/* border:1px solid #fff; */
} 

.book .left{
    width: 30%;
    background: #2e3037;
}

.book .left img
{width:100%;
    height: 80%;
}

.book .left .play{
    position: relative;
    left:44%;
    top: -22px;
    background: #fd6565;
    width:40px;
     height: 35px; 
     display:flex;
     align-items:center;
     justify-content: center;
    border-radius: 50%; 
    color:#fff;
    box-shadow: 0px 0px 20px #fd6565;
    transition: .3s linear;
    cursor: pointer;

}


.book .left .play:hover{
    transform: rotate(360deg);

}

.book .left .cont{
color:#fff;
padding: 0 20px;
height: 350px;

}

.book.left.cont p{
font-size: 12px;
margin-bottom: 20px;
}

.book.left.cont h6{
    font-size: 15px;
    /* margin-bottom: 20px; */
    }

.book .right{
    padding:10px 40px;
    background: unset;
}  

.book .right:before{
   position:absolute;
   content:'';
   width:95%;
   height:250px;
   /* border: solid #fff; */
   background: url(image/left4.jpg) no-repeat center -30px/cover;
   z-index:-10;
   border-radius: 20px;
} 


.book .right:after{
    position:absolute;
    content:'';
    width:95%;
    height:200px; 
    top:0;
    /* border: solid #fff; */
     background: linear-gradient(0deg , transparent,#1f2025);
    z-index:-10;
    border-radius: 20px;
 } 
 

 .book .right .head_time
{
    position:relative ;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;

} 
.book .right .head_time::before {
   content: '';
   position: absolute;
   width: 150px;
   height: 255px;
   top: 0;
   background: linear-gradient(90deg, transparent, #1f2025);
right: -25px;
z-index: -9;

}

/* .book .right .head_time::after {
    content: '';
    position: absolute;
    /* width: 170px; */
    /* height: 250px;
    top: 0;
    background: linear-gradient(270deg,transparent,#1f2025);
left: -25px;
 z-index: -9;
 
 } */ */

 .book .right .head_time h1 {
   /* color: #fff; */
   font-weight: 600;
 }

 .book .right .head_time .time {
    color: #fff;
   display: flex;
   align-items: center;
  }
  .book .right .head_time .time  h6{
   font-size: 13px;
   margin-right: 15px;
  }

  .book .right .head_time .time  h6 i{
    
    margin-right: 5px;
    box-shadow: 0px 0px 20px #99dd23;
   }
   .book .right .head_time .time button{
    
   padding: 4px 10px;
   border-radius: 10px;
   border: 2px solid #fd6565;
   color:#fff;
   background: none;
   font-size: 11px;
   cursor: pointer;
   font-weight: 600;
   transition: .3s linear;

   }



   .book .right .head_time .time button:hover{
    
  background:#fd6565 ;

 
    }
   
  
  
 .book .right .date_type{
    position: relative;
    display:flex ;
    align-items: center;
    justify-content: space-between;
 }
 .book .right .date_type .left_curd, .right_curd{
width:45%;
border:1px solid ;
;
 }
 .book .right .date_type::before{
    content: '';
    position: absolute;
    width: 102%;
    height: 215px;
    left:-15px;
    top:0;
    z-index: -9;
    background: linear-gradient(180deg,transparent,#1f2025);
 }

.book .right .left_curd .title

{
    color: #fff;
}

.book .right .left_curd .crd{
    width:100%;
    overflow-x: auto;
    display: flex;
    align-items: center;
    margin-top: 5px;
    border-top:1px solid rgb(184, 184, 184, .2);
    padding: 5px 0;
}


.book .right .left_curd .crd::-webkit-scrollbar{
   height:3px;
   background: rgbrgb(184, 184, 184, .2);
}
.book .right .left_curd .crd::-webkit-scrollbar-thumb{
    height:3px;
    background: rgbrgb(184, 184, 184, .5);
 }
 
 .book .right .left_curd .crd li{
 list-style: none;
 color: #fff;
 min-width: 40px;
 display: flex;
 align-items: center;
 justify-content: center;
 flex-direction: column;
 cursor: pointer;
 }

 .book .right .left_curd .crd li h6:nth-child(2){
   background: transparent;
   border-radius: 50%;
   width:20px;
   height: 20px;
   transition: .3s linear;
   cursor: pointer;
  display:flex ;
  align-items: center;
  justify-content: center;
  margin-top: 5px;
    }

    .book .right .left_curd .crd li h6:nth-child(2):hover{
        background: #fd6565;

         }



.book .right .left_curd .title

{
    color: #fff;
}

.book .right .crd{
    width:100%;
    overflow-x: auto;
    display: flex;
    align-items: center;
    margin-top: 5px;
    border-top:1px solid rgb(184, 184, 184, .2);
    padding: 5px 0;
}


.book .right .crd::-webkit-scrollbar{
   height:3px;
   background: rgbrgb(184, 184, 184, .2);
}
.book .right .crd::-webkit-scrollbar-thumb{
    height:3px;
    background: rgb(184, 184, 184, .5);
 }
 
 .book .right .crd li{
 list-style: none;
 color: #fff;
 min-width: 40px;
 display: flex;
 align-items: center;
 justify-content: center;
 flex-direction: column;
 cursor: pointer;
 }

 .book .right .crd li h6:nth-child(2){
   background: transparent;
   border-radius: 50%;
   width:20px;
   height: 20px;
   transition: .3s linear;
   cursor: pointer;
  display:flex ;
  align-items: center;
  justify-content: center;
  margin-top: 5px;
    }

    .book .right .crd li h6:nth-child(2):hover{
        background: #fd6565;

         }

 .book .right .date_type .right_card li h6:nth-child(2)
 {
   
    border-radius: 8px;
    width:unset;
    height: unset;
    padding: 1px 5px 0 5px;
 }  
 
 
/* js */

.h6_active
{
    background:#fd6565 !important ;

}

/* screen start */

.screen{
    position: relative;
     width:100%;
     border-top:3px solid #fd6565;
     margin-top: 50px;
     border-radius: 20%;
     overflow: hidden;
     box-shadow:inset 0px 10px 20px var(--color);
    text-align: center;
    padding-top:15px ;
    color:#fff;
    letter-spacing:5px;
    font-size: 18px;
    height: 100px;

}


.book .right .screen::before
{
    content: '';
    position: absolute;
    width: 100%;
    height: 20px;
    border-radius: 50%;
    box-shadow: 0px 0px 20px rgb(184, 184, 184, .6);
    top:-20px;
    right: -20px;
    left: 0;
}

.book .right .chair
{
    width:95%;
    /* border:1px solid #fff; */
    /* eita kata jabe, border */
    margin:auto;
   
}




/* ei jaygaei change korte hobe */





.book .right .chair .row{
    width:100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 5px;
}
.meow{
   position: relative;
   width: 35px;
   height: 25px;
   background: rgb(184, 184, 184, .3);
   list-style: none;
   border-radius: 5px;
   cursor: pointer;
   transition: .3s linear;
   font-size: 7px;
   display: flex;
   align-items: center;
   justify-content: center;
   color: #fff;
   font-weight: 600;


}

.book .right .chair .row li:before{
   content: '';
   position: absolute;
   width: 100%;
   height: 5px;
   background: rgb(184, 184, 184, .1);
   bottom: -8px;
   border-radius: 10px;

 }
 

/* .book .right .chair .row li:hover{
   background: greenyellow; 
   color:#000;
} */

.book .right .chair .row li:nth-child(3){
  margin-right: 30px;
 }

 .book .right .chair .row li:nth-last-child(1){
    margin-left: 30px;
   }

   .book .right .chair .row span{
color:#fff;
    font-size:8px;
    font-weight: 600;
    margin-left: 15px;
   }

 /* java class for colors   */




 
  
.book .right .details
{
width:100%;
margin-top: 40px;
display: flex;
align-items: center;
justify-content: center;
}

.book .right .details .details_chair
{
    display: flex;
    align-items: center;
}

.book .right .details .details_chair li
{
   position: relative;
   list-style: none;
   border-radius: 5px;
   transition: .3s linear;
   margin:0  25px;
   font-weight: 600;
   color: rgb(184, 184, 184, .3);
}

.book .right .details .details_chair li::before
{
 position:absolute ;
 content: '';
 width: 20px;
 height: 15px;
 background: rgb(184, 184, 184, .3);
border-radius: 5px;
left: -30px;
top: 2px;
transition: .3s linear;
}

.book .right .details .details_chair li::after
{
 position:absolute ;
 content: '';
 width: 20px;
 height: 4px;
 background: rgb(184, 184, 184, .1);
border-radius: 10px;
left: -30px;
bottom: -4px;

transition: .3s linear;
}



.book .right .details .details_chair li:nth-child(2)::after
{

 background: #a12424;
}
.book .right .details .details_chair li:nth-child(2)::before
{

 background: #a12424;
}


.book .right .details .details_chair li:nth-child(3)::after
{

 background: greenyellow;
}
.book .right .details .details_chair li:nth-child(3)::before
{

 background: greenyellow;
}
    
 .book .right .book_tic 
 {
    position: absolute;
    right: 5%;
    height: 50px;
    width: 50px;
    /* top:20px; */
   /* bottom:5px; */
    padding: 8px 9.5 px;
    border-radius: 50%;
    border: none;
    outline: none;
    background: #a12424;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    transition: .3s linear
 }  


 .book .right .book_tic:hover 
 {
   background:transparent;
   border-color: #a12424;
   color: #99dd23;
 } 


/* 




/* 
.seat-checkbox:disabled + label {
    background-color: red;
    cursor: not-allowed;
    pointer-events: none; 
}


.seat-checkbox:disabled + label:hover,
.seat-checkbox:disabled + label li:hover {
    box-shadow: none;
    background-color: red; 
}


.seat-checkbox:disabled + label li,
.seat-checkbox:disabled + label {
    background-color: red; 
    color: white; 
    cursor: not-allowed;
} */





/* .book .right .chair .row li {
   position: relative;
   width: 35px;
   height: 25px;
   background: rgb(184, 184, 184, .3);
   list-style: none;
   border-radius: 5px;
   cursor: pointer;
   transition: .3s linear;
   font-size: 7px;
   display: flex;
   align-items: center;
   justify-content: center;
   color: #fff;
   font-weight: 600;
} */

/* .book .right .chair .row li:before {
   content: '';
   position: absolute;
   width: 100%;
   height: 5px;
   background: rgb(184, 184, 184, .1);
   bottom: -8px;
   border-radius: 10px;
} */

/* Hover effect for available seats */



.book .right .chair .row {
   margin-bottom: 15px; /* Adjust the space as needed */
}

.book .right .chair .row li {
   position: relative;
   width: 30px;
   height: 20px;
   background: rgb(184, 184, 184, .1);
   list-style: none;
   border-radius: 5px;
   cursor: pointer;
   transition: .3s linear;
   font-size: 7px;
   display: flex;
   align-items: center;
   justify-content: center;
   color: #fff;
   font-weight: 600;
}

.book .right .chair .row li:before {
   content: '';
   position: absolute;
   width: 100%;
   height: 5px;
   background: rgb(184, 184, 184, .1);
   bottom: -8px;
   border-radius: 10px;
}

/* Hover effect for available seats */
.book .right .chair .row li:hover {
    box-shadow: 0 0 10px yellowgreen;
    cursor: pointer;
    background:transparent
}

/* Styles for disabled seats */
.book .right .chair .row li.disabled, 
.book .right .chair .row li.disabled:hover { /* Override hover for disabled */
    background: red;
    cursor: not-allowed;
    pointer-events: none;
}

.book .right .chair .row li.disabled input[type="checkbox"] {
    visibility: hidden; /* Hide checkbox for disabled seats */
}










.book .right .chair .row li:hover {
    box-shadow: 0 0 20px green;
    cursor: pointer; /* Ensure cursor pointer on hover */
}

/* Styles for disabled seats */
.book .right .chair .row li.disabled, 
.book .right .chair .row li.disabled:hover { /* Override hover for disabled */
    background: red;
    cursor: not-allowed; /* Show cursor as not-allowed for disabled seats */
    pointer-events: none; /* Disable all interactions */
}

.book .right .chair .row li.disabled input[type="checkbox"] {
    visibility: hidden; /* Hide the checkbox in disabled state */
}








.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}







</style>








</html>


