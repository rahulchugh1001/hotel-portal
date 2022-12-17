<x-header />


<div class="breadcrumb-section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb-text">
<h2>Our Rooms</h2>
<div class="bt-option">
<a href="{{route('index')}}">Home</a>
<span>Rooms</span>
</div>
</div>
</div>
</div>
</div>
</div>


<section class="room-details-section spad">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="room-details-item">
<img src="{{asset('frontend/img/room/room-details.jpg')}}" alt="">
<div class="rd-text">
<div class="rd-title">
<h3>Premium King Room</h3>
<div class="rdt-right">
<div class="rating">
<i class="icon_star"></i>
<i class="icon_star"></i>
<i class="icon_star"></i>
<i class="icon_star"></i>
<i class="icon_star-half_alt"></i>
</div>
<a href="#">Booking Now</a>
</div>
</div>
<h2>₹1590<span>/Pernight</span></h2>
<table>
<tbody>
<tr>
<td class="r-o">Size:</td>
<td>30 ft</td>
</tr>
<tr>
<td class="r-o">Capacity:</td>
<td>Max persion 5</td>
</tr>
<tr>
<td class="r-o">Bed:</td>
<td>King Beds</td>
</tr>
<tr>
<td class="r-o">Services:</td>
<td>Wifi, Television, Bathroom,...</td>
</tr>
</tbody>
</table>
<p class="f-para">Motorhome or Trailer that is the question for you. Here are some of the
advantages and disadvantages of both, so you will be confident when purchasing an RV.
When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth
wheeler? The advantages and disadvantages of both are studied so that you can make your
choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an
achievement of a lifetime. It can be similar to sojourning with your residence as you
search the various sites of our great land, America.</p>
<p>The two commonly known recreational vehicle classes are the motorized and towable.
Towable rvs are the travel trailers and the fifth wheel. The rv travel trailer or fifth
wheel has the attraction of getting towed by a pickup or a car, thus giving the
adaptability of possessing transportation for you when you are parked at your campsite.
</p>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="room-booking">
<h3>Your Reservation</h3>
<form action="#">
<div class="check-date">
<label for="date-in">Name:</label>
<input type="text" class="form-control" id="" placeholder="Full Name">
{{-- <i class="icon_calendar"></i> --}}
</div>
<div class="check-date">
<label for="date-out">Email:</label>
<input type="email" class="form-control" placeholder="Email">
{{-- <i class="icon_calendar"></i> --}}
</div>
<div class="check-date">
    <label for="date-out">Phone:</label>
    <input type="number" class="form-control" placeholder="Phone">
    {{-- <i class="icon_calendar"></i> --}}
    </div>

<button type="submit">Submit</button>
</form>
</div>
</div>
</div>
</div>
</section>


<x-footer />