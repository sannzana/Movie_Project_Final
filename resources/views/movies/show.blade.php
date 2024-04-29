










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style22.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Document</title>
</head>
<body>
 <div class="book">
<!-- left start -->
<div class="left">
    <img  src="{{ Storage::url($movie->poster_url) }}">
    <div class="play">
        <i class="bi bi-play-fill"></i>
</div>
<div class="cont">
    <h6>Directed By</h6>
    <p>dsfdsfd sdsds </p>
    <h6>Starring</h6>
    <p>dsfdsfd dsds dsfdsf, dsfd dsfdsf dsf</p>
    <h6>Starring</h6>
    <p>dsfdsfd</p>
    <!--      change later -->
</div>


</div>
<!-- left end -->

<!-- right start -->
<div class="right">
    <!-- video eikhn e dibo,1;21;53--1;24;02 -->
<!-- <video src=""></video> -->



<div class="head_time">
    <h1 style=" color: #fff;"> {{ $movie->title }}</h1>
    <!-- ei jaygayei database theke information asbe -->
     <div class="time">
    <h6><i class="bi bi-clock"></i>{{ $movie->duration }}</h6>
    <!-- database theke duration -->
    <button>PG-13</button>
</div>
</div>
<div class="date_type">
<div class="left_curd">
<!-- for date and time -->
<h4 class="title" style="color: aliceblue;">Thursday 3 May</h4>



</div>

<!-- timing er jonno -->

<div class="right_curd">
    <h4 class="title" style="color: aliceblue;">Thursday 3 May</h4>
<div class="card_month crd" style="color: aliceblue;">
   
</div>
</div>



</div>
<div class="screen">screen</div>
<!-- chairs -->






<div class="details" id="det">
    <div class="details_chair">
        <li>Available</li>
        <li>Booked</li>
        <li>Selected</li>

    </div>
</div>


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


</div>



 </div>  
    

<script src="app22.js"></script>










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
    width: 20%;
    background: #2e3037;
}

.book .left img
{width:100%;
    height: 60%;
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
    background: rgb(184, 184, 184, .5);
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





      
              

  

 

/* General styles for the movie showtimes section */
#dates-showtimes {
    background-color: rgba(0, 0, 0, 0.2); /* Dark background for contrast, corrected rgba syntax */
    color: #fff; /* White text color */
    padding: 20px;
    max-width: 100%; /* Ensures the container can fit within its parent */
    margin: 0 auto;
    border-radius: 20px; /* Adds rounded corners */
    background: linear-gradient(180deg,transparent,#000);
}


#dates-showtimes h2 {
    text-align: center; /* Center heading */
    margin-bottom: 30px;
    shadow: 0 2px 5px rgba(123,0,0,0.2); Subtle shadow
}

/* Style for individual date blocks */
#dates-showtimes h3{
    margin-top: 20px;
    text-align: center; /* Center dates */
}
#dates-showtimes .date-block {
    margin-bottom: 15px;
    text-align: center; /* Center dates */
}

/* List styling for showtimes */
#dates-showtimes ul {
    list-style-type: none; /* No bullets */
    padding: 0;
    display: flex; /* Flexbox for equal spacing */
    flex-wrap: wrap; /* Allow wrapping of items */
    justify-content: space-around; /* Space around items */
}

#dates-showtimes li {
    flex: 1 1 30%; /* Flex grow, shrink and basis */
    margin: 15px; /* Margin around each time block */
    height: 40px; /* Increased height */
    display: flex;
    align-items: center; /* Vertically center content inside the block */
    justify-content: center; /* Horizontally center content */
}

/* Button styling for showtimes */
#dates-showtimes button {
    transition: transform 0.3s, box-shadow 0.3s; /* Smooth transitions for hover effects */
    border: none; /* No border */
    outline: none; /* No outline */
    padding: 10px 20px; /* Padding inside button */
    width: 100%; /* Full width of its container */
}

/* Available showtime button styling */
#dates-showtimes .available {
    background-color: #444; /* Dark grey background */
    box-shadow: 0 2px 5px rgba(0,0,0,0.2); /* Subtle shadow */
}

#dates-showtimes .available:hover {
    transform: scale(1.05); /* Slightly larger on hover */
    box-shadow: 0 4px 15px rgba(0,255,0,0.5); /* Neon green shadow on hover */
}

/* Disabled showtime button styling */
#dates-showtimes .disabled {
    background-color: red; /* Red background for disabled */
    color: #fff; /* White text for contrast */
    cursor: not-allowed; /* No pointer cursor */
    opacity: 0.5; /* Half transparency */
}



/* 

@media (max-width: 768px) {
    .book {
        flex-direction: column;
        height: auto;
    }
    .book .left, .book .right {
        width: 100%;
        padding: 20px;
    }
    .book .right {
        order: 2; 
    }
    .book .right:before, .book .right:after {
        height: 150px; 
    }
    .book .right .head_time::before {
        width: 100px; 
    }
    
  
    .book .right .details .details_chair li {
        margin: 0 10px;
    }
}


@media (max-width: 480px) {
    body {
        display: block;
    }
    .book .left img {
        height: 50%; 
    }
    .book .left .play {
        left: 50%; 
        transform: translateX(-50%); 
    }





    .book .right .details .details_chair li {
        margin: 0 10px; 
    }







    .book .right:before, .book .right:after {
        height: 100px; 
    }
    .book .right .head_time::before {
        width: 80px; 
    }
   
    .book .right .details .details_chair li {
        margin: 0 5px; 
    }
    .book .right .details .details_chair li::before,
    .book .right .details .details_chair li::after {
        width: 15px;
        height: 10px;
    }
}





 */





/* 



@media (max-width: 768px) {
    #dates-showtimes button {
        padding: 10px 5px; 
    }
    #dates-showtimes ul {
        flex-direction: column;
    }
    #dates-showtimes li {
        flex: 1 1 100%; 
    }
}



 */







 

 @media only screen and (max-width: 1024px) {
    /* Styles for medium devices like tablets in landscape orientation or small desktops */

    .book {
        display: flex;
        flex-direction: row; /* side-by-side layout for .left and .right */
        align-items: stretch; /* Align items in a line */
        justify-content: space-between; /* Distributes space around items */
    }

    .book .left, .book .right {
        width: 50%; /* Each division takes half the width */
        padding: 20px; /* Add padding for separation */
    }

    .book .right .details {
        margin-top: 0; /* Remove any top margin as side-by-side layout provides more space */
    }

    .book .right .book_tic {
        right: 10%; /* Adjust the right margin for the button */
        width: 60px;
        height: 60px;
        padding: 10px 11px;
    }

    #dates-showtimes h2 {
        font-size: 22px; /* Larger font size suitable for larger screens */
    }

    #dates-showtimes button {
        padding: 12px 24px;
    }

    .details {
        display: flex; /* Keeps flex settings for center alignment */
        justify-content: center; /* Centers children horizontally in the container */
        align-items: center; /* Centers children vertically in the container */
    }

    .details .details_chair li {
        font-size: 16px; /* Suitable font size for larger screens */
        padding: 20px 10px; /* More generous padding */
        margin: 0 15px; /* Adjust margins for better spacing */
    }

    .details .details_chair li::before,
    .details .details_chair li::after {
        width: 14px; /* Appropriate size for icons */
        height: 14px;
    }
}
 

@media only screen and (max-width: 820px) {
    /* Styles for small tablets and large phones */

    .book {
        display: flex;
        flex-direction: column;
        align-items: stretch; /* Ensures child elements span the full width */
    }

    .book .left, .book .right {
        width: 100%; /* Each division takes the full width */
    }

    .book .right .details {
        margin-top: 20px;
    }

    .book .right .book_tic {
        right: 10%; /* Slightly more margin than on the smallest screens */
        width: 40px; /* Slightly larger button */
        height: 40px; /* Slightly larger button */
        padding: 8px 9.5px; /* Adjust padding */
    }

    #dates-showtimes h2 {
        font-size: 20px; /* Slightly larger font size for readability */
    }

    #dates-showtimes button {
        padding: 10px 24px; /* Larger padding inside button */
    }

    .details {
        padding-left: 15px; /* Adjust padding for smaller screens */
        display: flex; /* Establishes a flex container */
        justify-content: center; /* Centers children horizontally in the container */
        align-items: center; /* Centers children vertically in the container */
    }

    .details .details_chair li {
        font-size: 16px; /* Slightly larger font size */
        padding: 18px 10px; /* Adjust padding to make elements slightly larger */
        margin: 0 15px; /* Adjust margin to avoid crowding */
    }

    .details .details_chair li::before,
    .details .details_chair li::after {
        width: 15px; /* Slightly larger icons */
        height: 15px; /* Slightly larger icons */
    }
}


/* Responsive CSS for smaller screens */

@media only screen and (max-width: 768px) {
    /* Styles for tablets and smaller desktops */

    .book {
        display: flex;
        flex-direction: column;
        align-items: stretch; /* Ensures child elements span the full width */
    }

    .book .left, .book .right {
        width: 100%; /* Each division takes the full width */
    }

    .book .right .details {
        margin-top: 20px;
    }

    .book .right .book_tic {
        right: 10%; /* Slightly more space on the right compared to smaller devices */
        width: 40px; /* Slightly larger button for better interaction */
        height: 40px; /* Slightly larger button for better interaction */
        padding: 10px 10px; /* Adjusted padding for better visibility */
    }

    #dates-showtimes h2 {
        font-size: 20px; /* Larger font size for better readability on bigger screens */
    }

    #dates-showtimes button {
        padding: 10px 20px; /* More padding for a better tactile response */
    }

    .details {
        padding-left: 20px; /* More padding for alignment */
        display: flex; /* Establishes a flex container */
        justify-content: center; /* Centers children horizontally in the container */
        align-items: center; /* Centers children vertically in the container */
        /* Optional: Adjust height as necessary to fill container */
    }

    .details .details_chair li {
        font-size: 16px; /* Increase font size for readability on larger screens */
        padding: 20px 10px; /* More padding for larger elements */
        margin: 0 20px; /* More space between items */
    }

    .details .details_chair li::before,
    .details .details_chair li::after {
        width: 15px; /* Larger icons for better visibility */
        height: 15px; /* Larger icons for better visibility */
    }
}








@media only screen and (max-width: 480px) {
    /* Styles for mobile devices */

    .book {
        display: flex;
        flex-direction: column;
        align-items: stretch; /* Ensures child elements span the full width */
    }

    .book .left, .book .right {
        width: 100%; /* Each division takes the full width */
    }

    .book .right .details {
        margin-top: 20px;
    }

    .book .right .book_tic {
        right: 5%; /* Adjust button placement if necessary */
        width: 35px;
        height: 35px;
        padding: 7px 8.5px;
    }

    #dates-showtimes h2 {
        font-size: 18px; /* Adjust heading size for readability */
    }

    #dates-showtimes button {
        padding: 8px 16px;
    }
    .details {
        padding-left: 10px; /* Adjust padding for smaller screens */
        display: flex; /* Establishes a flex container */
        justify-content: center; /* Centers children horizontally in the container */
        align-items: center; /* Centers children vertically in the container */
        /* Optional: Adjust height as necessary to fill container */
    }

    .details .details_chair li {
        /* display:flex;  */
        font-size: 14px; /* Reduce font size for smaller screens */
        padding: 16px 2px; /* Adjust padding to make elements smaller */
        margin: 0 10px;
        /* align-items:center; */
    }

    .details .details_chair li::before,
    .details .details_chair li::after {
        width: 10px; /* Smaller icons */
        height: 10px; /* Smaller icons */
    }
}

    





</style>